<?php

namespace medin\services\manage;

use medin\entities\User\User;
use medin\forms\manage\User\UserCreateForm;
use medin\forms\manage\User\UserEditForm;
use medin\repositories\UserRepository;
use medin\services\RoleManager;
use medin\services\TransactionManager;
use yii\mail\MailerInterface;

class UserManageService
{
    private $repository;
    private $roles;
    private $transaction;
    private $mailer;

    public function __construct(
        UserRepository $repository,
        RoleManager $roles,
        TransactionManager $transaction,
        MailerInterface $mailer
    )
    {
        $this->repository = $repository;
        $this->roles = $roles;
        $this->transaction = $transaction;
        $this->mailer = $mailer;
    }

    public function create(UserCreateForm $form)
    {
        $user = User::create(
            $form->first_name,
            $form->last_name,
            $form->phone,
            $form->address,
            $form->username,
            $form->email,
            $form->password,
            $form->inn_number,
            $form->organization_name
        );
        $this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
        });
        return $user;
    }

    public function edit($id, UserEditForm $form)
    {
        $user = $this->repository->get($id);
        $user->edit(
            $form->username,
            $form->email
        );
        $this->transaction->wrap(function () use ($user, $form) {
            $this->repository->save($user);
            $this->roles->assign($user->id, $form->role);
        });
    }

    public function assignRole($id, $role)
    {
        $user = $this->repository->get($id);
        $this->roles->assign($user->id, $role);
    }

    public function remove($id)
    {
        $user = $this->repository->get($id);
        $this->repository->remove($user);
    }

    public function activate($id)
    {
        $user = $this->repository->get($id);
        if (!$user->isWait()) {
            throw new \DomainException('User is active.');
        }
        $user->status = User::STATUS_ACTIVE;
        $this->repository->save($user);
        try {
            $this->mail($user);
        } catch (\RuntimeException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    public function wait($id)
    {
        $user = $this->repository->get($id);
        if (!$user->isActive()) {
            throw new \DomainException('User is wait.');
        }
        $user->status = User::STATUS_WAIT;
        $this->repository->save($user);
        try {
            $this->mail($user);
        } catch (\RuntimeException $e) {
            \Yii::$app->session->setFlash('error', $e->getMessage());
        }
    }

    public function mail($user)
    {
        $this->mailer
            ->compose(
                ['html' => 'userchangestatus/confirm-html', 'text' => 'userchangestatus/confirm-text'],
                ['user' => $user]
            )
            ->setTo($user->email)
            ->setSubject('Change status for ' . $user->email)
            ->send();
    }
}
