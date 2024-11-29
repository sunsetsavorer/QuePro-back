<?php

namespace App\Domains\Tournament\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\Tournament\DTOs\CreateParticipationEntryDTO;
use App\Domains\Tournament\Entities\ParticipationEntryEntity;
use App\Domains\Tournament\Exceptions\ParticipationEntryCreationException;
use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;

class CreateParticipationEntry
{
    public function __construct(
        private TournamentRepositoryInterface $tournamentRepository
    ){}

    public function __invoke(CreateParticipationEntryDTO $dto): void
    {
        try {
            $entity = new ParticipationEntryEntity();

            $entity->setTournamentId($dto->getTournamentId());
            $entity->setTeamName($dto->getTeamName());
            $entity->setCaptainEmail($dto->getCaptainEmail());
            $entity->setCaptainFullname($dto->getCaptainFullname());
            $entity->setCaptainPhone($dto->getCaptainPhone());

            $this->tournamentRepository->createParticipationEntry($entity);

        } catch (ParticipationEntryCreationException $e) {
            throw new ServiceException('Не удалось подать заявку на участие');
        }
    }
}