<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class LihteController extends Controller
{
	/**
	 * @Route("/{username}", name="lihte", defaults={"username": "codereviewvideos"})
	 */
	public function lihteAction(Request $request, $username)
	{	
		$this->get('lihte_api')->getRepos($username);

		return $this->render('lihte/index.html.twig', [
			'username' => $username,
		]);
	}


	/**
	 * @Route("/profile/{username}", name="profile")
	 */
	public function profileAction(Request $request, $username)
	{	
		$profileData = $this->get('lihte_api')->getProfile($username);

		return $this->render('lihte/profile.html.twig', $profileData);
	}

	/**
	 * @Route("/repos/{username}", name="repos")
	 */
	public function reposAction(Request $request, $username)
	{
		$repoData = $this->get('lihte_api')->getRepos($username);

		return $this->render('lihte/repos.html.twig', $repoData);

	}
 }