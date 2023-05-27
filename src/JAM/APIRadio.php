<?php
/**
 * @author jambonbill
 * Food Recipes API
 * We are not logged in, therefore, _uid() return null
 */

namespace JAM;

use PDO;
use Exception;

class APIRadio extends API
{

    /**
     * Return the list of radios
     * @return [type] [description]
     */
    public function radios()
    {
        
        $sql = "SELECT id, title, description, url_main FROM radio WHERE id>0 AND `status` LIKE 'public';";
        
        //exit($sql);

        $q = $this->db()->prepare($sql);        
        $q->execute();        
        
        if($result = $q->fetchAll(PDO::FETCH_ASSOC)){
            return $result;            
        }
        return [];
    }



    /**
     * Return ALL my radio audio urls
     * Here the UID is hard coded
     * @return [type] [description]
     */
    public function urls(int $id):array
    {
        
        $sql = "SELECT id, url, url_img, name, url_status AS status FROM radio_urls WHERE id>0 AND radio_id=:id;";
        
        $q = $this->db()->prepare($sql);        
        
        $q->execute([':id' => $id]);

        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    

    
    public function get(int $id):array
    {
        $sql = "SELECT id, title, slug, description, url_main, url_logo FROM radio WHERE id>0 AND id=:id AND status LIKE 'public' LIMIT 1;";

        $q = $this->db()->prepare($sql);
        
        $q->execute(array(
            ':id' => $id
        ));

        if($result = $q->fetch(PDO::FETCH_ASSOC)){
            return $result;    
        }
        return [];
    }
    
   
    /*
    public function byPermalink(string $permalink)
    {
        $sql = "SELECT id, title, permalink, instructions, ingredients, category, lang 
        FROM log_recipes 
        WHERE id>0 AND permalink=:permalink ORDER BY date DESC;";

        $q = $this->db()->prepare($sql);
        
        $q->execute(array(
            ':permalink' => $permalink
        ));

        $result = $q->fetch(PDO::FETCH_ASSOC);
        return $result;
    }
    */
}
