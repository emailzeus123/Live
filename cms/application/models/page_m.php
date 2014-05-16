<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Page_m
 *
 * @author maxx
 */
class Page_m extends MY_Model {
    protected $_table_name = 'pages';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval'; 
    protected $_order_by = 'order';
    protected $_rules = array();
    protected $_timesstamps = FALSE;
}
