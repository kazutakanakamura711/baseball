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
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_players");
        $player['row_array'] = html_escape($this->model_players->getplayer($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("update", $player);
    }
    public function profile()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $team['team_array'] = html_escape($this->model_teams->getteam($id));
        $team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('profile', $team);
    }
    public function mail()
    {
        $id = $this->input->get('id');
        $this->output->set_header('X-Frame-Options: DENY', false);
        $this->load->model("model_teams");
        $team['team_array'] = html_escape($this->model_teams->getteam($id));
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
