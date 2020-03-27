<?php


/*********************************************
 *        display view
 * *******************************************/

class View
{
    /*********************************************
     *        template for display
     * *******************************************/

    private $template ;

    /*********************************************
     *        use layout true or flase
     * *******************************************/

    private $layout;

    /*********************************************
     *        data of view
     * *******************************************/

    private $data ;

    /*********************************************
     *        get template from Controller
     * *******************************************/

    public function __construct($view,$layout)
    {
        $this->template = $view;
        $this->layout   = $layout;
    }

    /*********************************************
     *        redirect to view
     * *******************************************/
    public function render($data = null)
     {
         if($this->layout == true)
         {
             ob_start();
             include(VIEW . $this->template . ".php");
             $contentpage = ob_get_clean();
             $pagename = $this->template;
             include_once(VIEW . "layout.php");
         }
         else
         {
             include(VIEW.$this->template.".php");
         }
     }
}