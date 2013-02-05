<?php
/**
 * Copyright 2013 NEPO Systems, LLC
 *
 * User   : Jeff Bickart
 * Email  : jeff@neposystems.com
 * Twitter: @bickart
 * Blog   : http://sugarcrm-dev.blogspot.com/
 * Date   : January 15, 2013
 *
 */
require_once('include/MVC/View/views/view.ajax.php');

class Viewsendpackage extends ViewAjax
{
    public function display()
    {
        global $current_user;
        $status = array( 'status' => 'fail' );

        $this->bean->load_relationship('camp_campus_initiatives_contacts');
        if (isset($_REQUEST['campus_initiatives'])) {
            $camp_list = $_REQUEST['campus_initiatives'];
            foreach ($camp_list as $c) {
                $this->bean->camp_campus_initiatives_contacts->add($c, array( 'date_label_sent' => date("Y-m-d H:i:s") ));
            }
            $status['status'] = 'success';

            $current_user->setPreference('dymo_label', $_REQUEST['label_id']);
        } else {
            $status['msg'] = 'Campus Initiatives have not been selected!';
        }

        echo json_encode($status);
    }
}