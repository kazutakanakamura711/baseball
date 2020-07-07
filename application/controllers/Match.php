<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Match extends CI_Controller
{
    //試合申し込みへ
    public function game()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $teamid = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($teamid));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game', $player);
    }
    //連絡フォームへ
    public function contact()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $teamid = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] = html_escape($this->model_teams->getteam($teamid));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('contact', $player);
    }
    public function team_details()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_team");
        $team['name'] = $this->model_team->get_name($id);
        $this->load->model("model_scores");
        $team['teamscore_array'] = $this->model_scores->getteamscore($id);
        $clean_team = html_escape($team);
        $this->load->view("team_details", $clean_team);
    }
    public function ground()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
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
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY');
        $this->load->view('rules');
    }
}
