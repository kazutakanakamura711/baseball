<?php
/**
 * ページネーション
 */
defined('BASEPATH') OR exit('No direct script access allowed');
$config['reuse_query_string'] = TRUE;
$config['page_query_string'] = TRUE;		// QueryString仕様
$config['query_string_segment'] = 'page';	// ?page=[number]
$config['use_page_numbers'] = TRUE;			// 1ページから開始
$config['per_page'] = 1;
//ページネーション全体を囲む
$config['full_tag_open'] = '<ul class="pagination">';
$config['full_tag_close'] = '</ul>';
//最初と最後のリンク
$config['first_link'] = false;
$config['last_link'] = false;
//"次" のページへのリンク
$config['next_tag_open'] = '<li>';
$config['next_tag_close'] = '</li>';
//"前" のページへのリンク
$config['prev_tag_open'] = '<li>';
$config['prev_tag_close'] = '</li>';
//"現在のページ" のページ番号
$config['cur_tag_open'] = '<li class="active"><span>';
$config['cur_tag_close'] = '</span></li>';
//"数字" のページリンク
$config['num_tag_open'] = '<li>';
$config['num_tag_close'] = '</li>';
