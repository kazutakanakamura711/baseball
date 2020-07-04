<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Match extends CI_Controller
{
    //試合申し込みへ
    public function game()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game', $player);
    }
    //連絡フォームへ
    public function contact()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('contact', $player);
    }
    public function ground()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->view('ground');
    }
    public function schedule()
    {
        $this->load->view('schedule');
    }
    public function recruit()
    {
        $this->load->view('recruit_player');
    }
    public function chat()
    {
        $this->load->view('chat');
    }
    public function tactics()
    {
        $this->load->view('tactics');
    }
    public function rules()
    {
        $this->output->set_header('X-Frame-Options: DENY');
        $this->load->view('rules');
    }
}
