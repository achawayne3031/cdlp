<?php


class ScheduledEmail{


    private $db;

    public function __construct(){
        $this->db = new Database;
    }


    public function getScheduledEmails(){
        $this->db->query("SELECT * FROM scheduled_emails ORDER BY id DESC");
        $results = $this->db->resultSet();
        return $results;
    }


    public function addMailData($data){
        $this->db->query("INSERT INTO scheduled_emails(recipient_email, subject, body, scheduled_time) VALUES(:recipient_email, :subject, :body, :scheduled_time)");
        $this->db->bind(':recipient_email', $data['recipient_email']);
        $this->db->bind(':subject', $data['subject']);
        $this->db->bind(':body', $data['body']);
        $this->db->bind(':scheduled_time', $data['scheduled_time']);

        if($this->db->execute()){
            return true;
        }else{
            return false;
        }

    }



}



