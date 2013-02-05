<?php
/**
 * Copyright 2013 NEPO Systems, LLC
 *
 * User   : Jeff Bickart
 * Email  : jeff@neposystems.com
 * Twitter: @bickart
 * Date   : January 15, 2013
 *
 */

require_once('include/MVC/View/views/view.ajax.php');

class Viewdymo extends ViewAjax
{

    //    var $campaigns = array( '' => '' );
    var $campaigns = array();
    var $labels = array();

    public function preDisplay()
    {
        //$campaign = BeanFactory::getBean('Campaigns');
        $campaign = BeanFactory::getBean('camp_Campus_Initiatives');
        $campaign->disable_row_level_security = true;
        $allCampaigns = $campaign->get_list();
        if (isset($allCampaigns['list'])) {
            foreach ($allCampaigns['list'] as $c) {
                //              if ($c->status == 'Active')
                $this->campaigns[$c->id] = $c->name;
            }
        }

        $label = new Document();
        $label->disable_row_level_security = true;
        $label_list = $label->get_list("", "template_type = 'label'");

        foreach ($label_list['list'] as $l) {
            $this->labels[$l->document_revision_id] = $l->name;
        }
        array_multisort($this->labels);
    }

    public function display()
    {
        global $current_user;

        $this->ss->assign('RECORD', $this->bean->id);
        $this->ss->assign('CAMPAIGNS', get_select_options($this->campaigns, ""));
        $this->ss->assign('LABELS', get_select_options($this->labels, $current_user->getPreference('dymo_label')));
        $this->ss->assign('NAME', "{$this->bean->name}\n{$this->bean->primary_address_street}\n{$this->bean->primary_address_city}, {$this->bean->primary_address_state} {$this->bean->primary_address_postalcode}");

        $data = array();
        $data['form'] = $this->ss->fetch('custom/modules/Contacts/tpls/DymoLabel.tpl');
        echo json_encode(array( $data ));
    }
}