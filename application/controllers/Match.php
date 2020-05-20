<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Match extends CI_Controller
{
    //試合申し込みへ
    public function game()
    {
        $id = $this->input->post('matching_id');
        $this->load->model("model_teams");
        $player['row_array'] =$this->model_teams->getteam($id);
        $this->load->view('game',$player);
    }
    //連絡フォームへ
    public function contact()
    {
        $id = $this->input->post('matching_id');
        $this->load->model("model_teams");
        $player['row_array'] =$this->model_teams->getteam($id);
        $this->load->view('contact',$player);
    }
    public function ground()
    {
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
        $this->load->view('rules');
    }
}
