<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class GitHutController extends Controller
{
    /**
     * @Route("/{username}", name="githut", defaults={"username": "seyfer"})
     */
    public function indexAction(Request $request, $username)
    {
        $templateData = [
            'username' => $username,
        ];

        return $this->render('AppBundle:GitHutController:index.html.twig', $templateData);
    }

    /**
     * @Route("/profile/{username}", name="profile", defaults={"username": "seyfer"})
     *
     * @param Request $request
     * @param $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function profileAction(Request $request, $username)
    {
        $api = $this->get('githubApi');

        $templateData = $api->getProfile($username);

        return $this->render('@App/GitHutController/profile.html.twig', $templateData);
    }

    /**
     * @Route("/repos/{username}", name="repos")
     *
     * @param Request $request
     * @param $username
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function reposAction(Request $request, $username)
    {
        $repos = $this->get('githubApi')->getRepositories($username);

        return $this->render('@App/GitHutController/repos.html.twig', $repos);
    }
}
