<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Match extends CI_Controller
{
    //試合申し込みへ
    public function game()
    {
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] =$this->model_teams->getteam($id);
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game',$player);
    }
    //連絡フォームへ
    public function contact()
    {
        $id = $this->input->get('id');
        $this->load->model("model_teams");
        $player['row_array'] =$this->model_teams->getteam($id);
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('contact',$player);
    }
    public function game_result()
    {
        $data['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view('game_result',$data);
    }
    public function game_register()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_games");
        $this->model_games->add_game($day);
        //redirect("main/players");
        exit(json_encode(['player' => '更新完了']));
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
