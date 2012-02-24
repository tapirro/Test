<?php
class sfMemcachedBehavior
{       
    public function preSave(BaseObject $object) 
       {
        //$cache = new sfMemcacheCache();  
        $cacheKey = 'too_'.get_class($object).'_'.$object->getId();  
        //$cache->set($cacheKey, serialize($object), 3600);
        
        //print_r($object);
        //echo "preSave";
        
        //$cacheKey = "too_{$class}_{$pk}";
        //echo $cacheKey; 
        $cache = new sfMemcacheCache(array("host"=>"127.0.0.1", "port"=>"11211")); 
        $cache->set($cacheKey, serialize($object), 360000);
          
        //echo  $cacheKey;
        //$cache->set('debug', $object->getId(), 3600);
        //echo $cache->getOption('prefix').'debug';
        //print_r(get_class($object));
        
        
     }
     
      public function criteriaCached($class, $criteria, $con = null)  
      {
          //echo "sdsdsds";
          
          $cache = new sfMemcacheCache();
          //print_r($criteria->getCriterion('usr.ID'));
          //echo "<pre>";
          $map = $criteria->getMap();
          if(count($map)==1){
                $model =  current($map)->getTable();
                $column = current($map)->getColumn();
                }
          $id =  $criteria->getValue("$model.$column");
          if($id){
            $cacheKey = 'too_'.ucfirst($model).'_'.$id;
            echo $cacheKey ;  
            }
           
          //echo "</pre>";
 
          if($cache->has($cacheKey)){
            
            echo 'cached';  return unserialize($cache->get($cacheKey)); 
          } else
          {echo 'cache not found';}  
        //  else return false;
          
      }
          
          public function doSelect11($class, $criteria, $con = null)
      {
          echo "sdsdsds";
          
          $cache = new sfMemcacheCache();
          //print_r($criteria->getCriterion('usr.ID'));
          //echo "<pre>";
          $map = $criteria->getMap();
          if(count($map)==1){
                $model =  current($map)->getTable();
                $column = current($map)->getColumn();
                }
          $id =  $criteria->getValue("$model.$column");
          if($id){
            $cacheKey = 'too_'.ucfirst($model).'_'.$id;
            echo $cacheKey ;  
            }
           
          //echo "</pre>";
 
          if($cache->has($cacheKey)){
            
            echo 'cached';  return unserialize($cache->get($cacheKey)); 
          } else
          {echo 'cache not found';}  
        //  else return false;
          
      }    
      
      public static function retrieveByPk($peer_class, $pk, $con = null) 
      {
          $class = (str_replace("Peer","",$peer_class)); 
          $cache = new sfMemcacheCache(array("host"=>"127.0.0.1", "port"=>"11211"));
          //print_r($criteria);
          
          
          //if(in_array("Hidden", call_user_func(array($peer_class, 'getPhpNameMap')))){;}
                    
          $cacheKey = "taskana_too_{$class}_{$pk}";
         
          if($cache->has($cacheKey)){ 
            //echo $cacheKey.": cached : ".strlen($cache->get($cacheKey));
             
            return unserialize($cache->get($cacheKey)); 
          }
          else{ 
              $res = call_user_func(array("Base".$peer_class, 'retrieveByPK'),$pk, $con);
              //$res = parent::retrieveByPk($pk, $con = null); 
              //echo $cacheKey.": not cached : ".strlen(serialize($res)); 
              //print_r( $res);
              //$test = 
              $cache->set($cacheKey, serialize($res), 360000); 
              //if(!$cache->has($cacheKey)) echo  'false!';
              return $res;}
            
      }
     
} 
?>
