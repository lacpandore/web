<?php

namespace AppBundle\Controller\Admin\GithubUser;

use AppBundle\Event\Model\Repository\GithubUserRepository;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

class GithubUserListAction
{
    /** @var GithubUserRepository */
    private $githubUserRepository;
    /** @var Environment */
    private $twig;

    public function __construct(
        GithubUserRepository $githubUserRepository,
        Environment $twig
    ) {
        $this->githubUserRepository = $githubUserRepository;
        $this->twig = $twig;
    }

    public function __invoke(Request $request)
    {
        $githubUsers = $this->githubUserRepository->getAll();

        return new Response($this->twig->render('admin/github_user/list.html.twig', [
            'githubUsers' => $githubUsers,
            'nbGithubUsers' => count($githubUsers),
        ]));
    }
}
