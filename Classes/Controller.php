<?php
    /*********************************************
     *           principle Controller
     * *******************************************/

 class  Controller
{
     /*********************************************
      *            get view from class view
      * *******************************************/

        public  function index($view,$data = null,$layout = true)
        {
           $template = new View($view,$layout);
           $template->render($data);
        }


}