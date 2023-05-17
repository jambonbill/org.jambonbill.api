<?php
/**
 * @author jambonbill
 * Food Recipes API
 * We are not logged in, therefore, _uid() return null
 */

namespace JAM;

use PDO;
use Exception;

class APIRecettes extends API
{
    

    
    /**
     * Return ALL my public portfolio items.
     * Here the UID is hard coded
     * @return [type] [description]
     */
    
    public function items()
    {
        $sql = "SELECT id, title, category, permalink, lang 
        FROM log_recipes
        WHERE id>0;";
        
        $q = $this->db()->prepare($sql);
        
        $q->execute();

        $result = $q->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    
    
    public function get(int $id)
    {
        $sql = "SELECT id, title, permalink, instructions, ingredients, category, lang 
        FROM log_recipes 
        WHERE id>0 AND id=:id ORDER BY date DESC;";

        $q = $this->db()->prepare($sql);
        
        $q->execute(array(
            ':id' => $id
        ));

        $result = $q->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

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

}
