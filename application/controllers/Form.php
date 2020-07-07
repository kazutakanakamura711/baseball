<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Form extends CI_Controller
{
    public function signup()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("signup", $data);
    }
    //選手情報変更へ
    public function update_player()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $playerid = $this->input->get('id');
        $this->load->model("model_players");
        $player['row_array'] = html_escape($this->model_players->getplayer($playerid));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("update", $player);
    }
    public function profile()
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
        $team['team_array'] = html_escape($this->model_teams->getteam($teamid));
        $team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('profile', $team);
    }
    public function mail()
    {
        $id = $_SESSION['id'];
        $this->load->model("model_team");
        $row = $this->model_team->get_flag($id);
        if (!$this->session->userdata("is_logged_in") || $row != 0) {
            redirect("main/login");
            return;
        }
        $teamid = $this->input->get('id');
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->model("model_teams");
        $team['team_array'] = html_escape($this->model_teams->getteam($teamid));
        $team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("mail_send", $team);
    }
    public function password()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("password", $team);
    }
}
