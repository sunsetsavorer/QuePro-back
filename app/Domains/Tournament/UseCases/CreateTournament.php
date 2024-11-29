<?php

namespace App\Domains\Tournament\UseCases;

use App\Domains\Common\Exceptions\ServiceException;
use App\Domains\Tournament\DTOs\CreateTournamentDTO;
use App\Domains\Tournament\Entities\TournamentEntity;
use App\Domains\Tournament\Exceptions\TournamentCreationException;
use App\Domains\Tournament\Interfaces\TournamentRepositoryInterface;

class CreateTournament
{
    public function __construct(
        private TournamentRepositoryInterface $tournamentRepository
    ){}

    public function __invoke(CreateTournamentDTO $dto): array
    {
        try {
            $entity = new TournamentEntity();

            $entity->setName($dto->getName());
            $entity->setUserId($dto->getUserId());
            $entity->setPrizeFund($dto->getPrizeFund());
            $entity->setEventDate($dto->getEventDate());
            $entity->setDisciplineId($dto->getDisciplineId());

            return $this->tournamentRepository->create($entity);
        } catch (TournamentCreationException $e) {
            throw new ServiceException('Не удалось создать турнир', 400);
        }
    }
}