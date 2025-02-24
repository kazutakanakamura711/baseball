<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Dust extends CI_Controller
{
    public function deletes()
    {
        $this->output->set_header('X-Frame-Options: DENY', false);
        $id = $this->input->get('id');
        $this->load->model("model_players");
        $player['player_array'] = html_escape($this->model_players->getplayers($id));
        $player['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("home/delete_player", $player);
    }
    public function stop_teams()
    {
        if (!$this->session->userdata("is_logged_in")) {
            redirect("main/login");
            return;
        }
        $this->output->set_header('X-Frame-Options: DENY');
        $this->load->model("model_teams");
        $team['team_array'] = $this->model_teams->getteams();
        $clean_team = html_escape($team);
        $clean_team['csrf'] = array(
            'name' => $this->security->get_csrf_token_name(),
            'hash' => $this->security->get_csrf_hash()
        );
        $this->load->view("supervisor/delete_team", $clean_team);
    }
    public function player_return()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_players");
        if($this->model_players->return_player($day)){
            exit(json_encode(['player' => '復帰完了']));
        }else{
            echo "選手復帰できませんでした。";
        }  
    }
    public function delete_real()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->model("model_players");
        if($this->model_players->real_delete()){
            exit(json_encode(['player' => '削除完了']));
        }else{
            echo "選手削除できませんでした。"; 
        } 
    }
    //選手削除
    public function delete_player()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_players");
        if($this->model_players->delete_player($day)){
            exit(json_encode(['player' => '削除完了']));
        }else{
            echo "選手削除できませんでした。";   
        }     
    }
    //スコア削除
    public function delete_score()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_scores");
        if($this->model_scores->score_delete($day)){
            exit(json_encode(['score' => '削除完了']));
        }else{
            echo "スコア削除できませんでした。"; 
        }       
    }
    //チーム利用停止
    public function stop_team()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_manager");
        if($this->model_manager->stop_team($day)){
            exit(json_encode(['team' => '削除完了']));
        }else{
            echo "チーム削除できませんでした。"; 
        }    
    }
    public function team_return()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_manager");
        if($this->model_manager->return_team($day)){
            exit(json_encode(['team' => '復帰完了']));
        }else{
            echo "チーム復帰できませんでした。";
        } 
    }
    public function delete_team()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->model("model_manager");
        if($this->model_manager->delete_team()){
            exit(json_encode(['team' => '削除完了']));
        }else{
            echo "チーム削除できませんでした。";
        } 
    }
    public function end_message()
    {
        header("Content-type: application/json; charset=UTF-8");
        $day = date("Y-m-d H:i:s");
        $this->load->model("model_supports");
        if($this->model_supports->end_message($day)){
            exit(json_encode(['messasge' => '削除完了']));
        }else{
            echo "問い合わせを削除できませんでした。";
        }  
    }
    public function delete_message()
    {
        header("Content-type: application/json; charset=UTF-8");
        $this->load->model("model_supports");
        if($this->model_supports->delete_message()){
            exit(json_encode(['messasge' => '削除完了']));
        }else{
            echo "問い合わせを削除できませんでした。";
        }
    }
}
