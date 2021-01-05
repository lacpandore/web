<?php

namespace AppBundle\Controller\Admin\Event;

use AppBundle\Controller\Event\EventActionHelper;
use AppBundle\Event\Model\Repository\SpeakerRepository;
use AppBundle\Event\Speaker\SpeakerPage;
use Symfony\Component\HttpFoundation\Request;

class SpeakerInfosAction
{
    /** @var EventActionHelper */
    private $eventActionHelper;
    /** @var SpeakerRepository */
    private $speakerRepository;
    /** @var SpeakerPage */
    private $speakerPage;

    public function __construct(
        EventActionHelper $eventActionHelper,
        SpeakerRepository $speakerRepository,
        SpeakerPage $speakerPage
    ) {
        $this->speakerRepository = $speakerRepository;
        $this->speakerPage = $speakerPage;
        $this->eventActionHelper = $eventActionHelper;
    }

    public function __invoke(Request $request)
    {
        $event = $this->eventActionHelper->getEventById($request->query->get('id'), false);
        $speaker = $this->speakerRepository->get($request->get('speaker_id'));

        return $this->speakerPage->handleRequest($request, $event, $speaker);
    }
}
