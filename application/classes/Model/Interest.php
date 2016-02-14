<?php defined('SYSPATH') or die('No direct script access.');
 
class Model_Interest extends Model
{
    private static $tableName = 'interests';
    
    public static function getInterests()
    {
        $query = DB::select('id', 'title')
                               ->from(self::$tableName);
        
        return $query->execute()->as_array();
    }
    public static function getUserInterests($user)
    {
        $query = DB::select('interest_id')
                               ->from('users_interests')
                               ->where('user_id', '=', $user);
        
        return $query->execute()->as_array();
    }
    public static function addInterests($post, $id)
    {
        
        $interestsArr = explode(',', $post['interests']);
        
            $db = Database::instance();
            $db->begin();
        
            try
            {
                DB::delete('users_interests')
                     ->where('user_id', '=', $id)->execute();
                
                if(!empty($interestsArr[0]))
                {
                    // Insert interests
                    $interestsQuery = DB::insert('users_interests', 
                                                array('user_id', 'interest_id'));

                    for($i = 0; $i < count($interestsArr); $i++)
                    {
                        $interestsQuery->values(array($id, $interestsArr[$i]));
                    }

                    $interestsQuery->execute();
                }
               
                $db->commit();
                
            }
            catch (Database_Exception $e)
            {
                 $db->rollback();
            }       
            
    }
}