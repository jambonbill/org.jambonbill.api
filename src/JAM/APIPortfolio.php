<?php
/**
 * @author jambonbill
 * Portfolio API
 * We are not logged in, therefore, _uid() return null
 */

namespace JAM;

use PDO;
use Exception;

class APIPortfolio extends API
{
    
    
    /**
     * Return ALL my public portfolio items.
     * Here the UID is hard coded
     * @return [type] [description]
     */
    public function itemsPublic()
    {
        $sql = "SELECT id, title, date, permalink, description_short, description_long, tags, url, url_git, url_youtube, url_img 
        FROM portfolio_items 
        WHERE id>0 AND created_by = :uid AND status LIKE 'public' ORDER BY date DESC;";
        
        $q = $this->db()->prepare($sql);
        
        $q->execute(array(
            ':uid' => 19
        ));

        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    
    public function item(int $id)
    {
        $sql = "SELECT id, title, date, permalink, description_short, description_long, tags, url, url_git, url_youtube, url_img 
        FROM portfolio_items 
        WHERE id>0 AND id=:id AND created_by = :uid ORDER BY date DESC;";

        $q = $this->db()->prepare($sql);
        
        $q->execute(array(
            ':uid' => 19,
            ':id' => $id
        ));

        $result = $q->fetch(PDO::FETCH_ASSOC);
        return $result;   
    }

}
