<?php

namespace ClippyKB\Controllers;

use ReCaptcha\ReCaptcha;
use Stem\Core\Controller;
use Symfony\Component\HttpFoundation\Request;

class IssuesController extends Controller {
	public function submitIssue(Request $request) {
		if (!$request->request->has('nonce') || !$request->request->has('name') || !$request->request->has('email') || !$request->request->has('issue')) {
			wp_send_json(['status' => 'error', 'message' => 'Missing required fields'], 400);
		}


		$recaptchaToken = $request->request->get('g-recaptcha-response');
		if (empty($recaptchaToken)) {
			wp_send_json(['status' => 'error', 'message' => 'Missing recaptcha token'], 400);
		}
		
		$recaptcha = new ReCaptcha(getenv('RECAPTCHA_SERVER'));
		$result = $recaptcha->verify($recaptchaToken);
		if (!$result->isSuccess()) {
			wp_send_json(['status' => 'error', 'message' => 'Invalid Captch'], 400);
		}


		$nonce = $request->request->get('nonce');
		if (!wp_verify_nonce($nonce, 'submit-issue')) {
			wp_send_json(['status' => 'error', 'message' => 'Invalid nonce'], 400);
		}

		$name = $request->request->get('name');
		$email = $request->request->get('email');
		$issue = $request->request->get('issue');


		$crispWeb = getenv('CRISP_BEACON_ID');
		$crispToken = getenv('CRISP_TOKEN');
		$crispKey = getenv('CRISP_KEY');

		if (!empty($crispWeb) && !empty($crispWeb) && !empty($crispKey))  {
			$client = new \Crisp();
			$client->authenticate($crispToken, $crispKey);

			$conversation = $client->websiteConversations->create($crispWeb);
			$sid = $conversation['session_id'];

			$client->websiteConversations->updateMeta($crispWeb, $sid, [
				'email' => $email,
				'nickname' => $name
			]);

			$client->websiteConversations->sendMessage($crispWeb, $sid, [
				'type' => 'text',
				'from' => 'user',
				'origin' => 'email',
				'content' => $issue
			]);
		}

		wp_send_json(['status' => 'ok'], 200);
	}
}