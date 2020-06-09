<?php


namespace App\Services;


use App\Repositories\MessageRepository\MessageRepositoryInterface;

class MessageService extends Service
{
    /**
     * @var MessageRepositoryInterface
     */
    private $repository;

    public function __construct(MessageRepositoryInterface $repository)
    {
        parent::__construct($repository);
        $this->repository = $repository;
    }

    public function allMessagesWithThisJob($job, $user)
    {
        return $this->repository->allMessages($job, $user);
    }

    public function create($data)
    {
        return $this->repository->create($data);
    }
}
