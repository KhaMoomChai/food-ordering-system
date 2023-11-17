<?php
include_once __DIR__.'/../model/feedbackModel.php';

class feedbackController extends Feedback
{

    public function addFeedback($email,$feedback)
    {
        return $this->createFeedback($email,$feedback);
    }
    public function getFeedback()
    {
        return $this->getFeedbacksList();
    }
    public function checkOrder($user_id)
    {
        return $this->getOrder($user_id);
    }
}