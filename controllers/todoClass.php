<?php
class todoClass
{

  public function updateTodoAssignUser($id,$assign_user){
    try{
      $db = getDB();
      $stmt = $db->prepare("UPDATE `onoffice_todo` SET `assign_user`=:assign_user
      WHERE id=:id");    
           $stmt->bindParam("id", $id,PDO::PARAM_INT) ;  
           $stmt->bindParam("assign_user", $assign_user,PDO::PARAM_STR) ;
           $stmt->bindParam("assigned_user_id", $assigned_user_id,PDO::PARAM_STR) ;
           $stmt->execute();
           $task_id=$db->lastInsertId();
           $db = null;
           return true;
      } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
  }

  public function assignTodoUser($todo_id,$value,$first_name,$visible,$user_id){
    try{
      $db = getDB();
      $stmt = $db->prepare("INSERT INTO `onoffice_todo_assign_user`(`todo_id`, `assigned_user_id`,`first_name`,`visible`,`user_id`) 
      VALUES (:todo_id,:assigned_user_id,:first_name,:visible,:user_id)");  
           $stmt->bindParam("todo_id", $todo_id,PDO::PARAM_INT) ;  
           $stmt->bindParam("assigned_user_id", $value,PDO::PARAM_INT) ; 
           $stmt->bindParam("first_name", $first_name,PDO::PARAM_STR) ;  
           $stmt->bindParam("visible", $visible,PDO::PARAM_STR) ;   
           $stmt->bindParam("user_id", $user_id,PDO::PARAM_STR) ;   
           $stmt->execute();
           $task_id=$db->lastInsertId();
           $db = null;
           return true;
      } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
  }

  public function getAssignTodoUser($todo_id){
    try{
      $db = getDB();
      $stmt = $db->prepare("SELECT * FROM onoffice_todo_assign_user WHERE todo_id=:todo_id AND visible=1");  
                $stmt->bindParam("todo_id", $todo_id,PDO::PARAM_INT);
                $stmt->execute();                
                $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
               
      return $data;
      } catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }
  }

     /* todoDetails*/
     public function todoDetails($uid,$company_id,$state){
        try{//
           //SELECT onoffice_todo.user_id,onoffice_todo.company_id, onoffice_todo.id,onoffice_todo.item,onoffice_todo.content,onoffice_todo.task,onoffice_todo.assign_user,onoffice_todo_assign_user.assigned_user_id FROM onoffice_todo_assign_user INNER JOIN onoffice_todo ON onoffice_todo_assign_user.id = onoffice_todo.id ORDER BY id;
            if($state == "user"){//SELECT * FROM onoffice_todo_assign_user WHERE user_id=:user_id
              $db1 = getDB();
              $stmt1 = $db1->prepare("SELECT * FROM onoffice_todo_assign_user WHERE assigned_user_id=:user_id AND company_id=:company_id");
              $stmt1->bindParam("company_id", $company_id,PDO::PARAM_INT);
              $stmt1->bindParam("user_id", $uid,PDO::PARAM_INT);  
              $stmt1->execute();
              $data1 = $stmt1->fetchAll(PDO::FETCH_ASSOC);
             return $data1;
            }else if($state == "default"){
            $db2 = getDB();
            $stmt2 = $db2->prepare("SELECT * FROM onoffice_todo WHERE company_id=:company_id AND assign_user='public' OR user_id=:user_id");  
            $stmt2->bindParam("company_id", $company_id,PDO::PARAM_INT);
            $stmt2->bindParam("user_id", $uid,PDO::PARAM_INT);  
            $stmt2->execute();
            $data2 = $stmt2->fetchAll(PDO::FETCH_ASSOC);
           return $data2;
            }
            
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }

     public function todoDetailsUser($uid){
      try{//
          $db = getDB();//SELECT onoffice_todo.user_id,onoffice_todo.company_id, onoffice_todo.id,onoffice_todo.item,onoffice_todo.content,onoffice_todo.task,onoffice_todo.assign_user,onoffice_todo_assign_user.assigned_user_id FROM onoffice_todo_assign_user INNER JOIN onoffice_todo ON onoffice_todo_assign_user.id = onoffice_todo.id ORDER BY id;
          $stmt = $db->prepare("SELECT * FROM onoffice_todo_assign_user WHERE user_id=:user_id");  
                
                    $stmt->bindParam("user_id", $uid,PDO::PARAM_INT);
                    $stmt->execute();
                   // $data = $stmt->fetch(PDO::FETCH_OBJ);
                   $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
                  
          return $data;
       }
       catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }

   }
     
     public function removeTodo($company_id,$id){
      try{
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM `onoffice_todo` WHERE company_id=:company_id AND id=:id");  
        $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("id", $id,PDO::PARAM_INT) ;  
             $stmt->execute();
             $task_id=$db->lastInsertId();
             $db = null;
             return true;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
     }

     public function removeTodoUser($id){
      try{
        $db = getDB();
        $stmt = $db->prepare("DELETE FROM `onoffice_todo_assign_user` WHERE id=:id");   
             $stmt->bindParam("id", $id,PDO::PARAM_INT) ;  
             $stmt->execute();
             $task_id=$db->lastInsertId();
             $db = null;
             return true;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
     }


     public function addTodo($company_id,$user_id,$item,$content,$todo_type){
      try{
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO `onoffice_todo`(`company_id`,`user_id`, `item`, `content`,`task`) 
        VALUES (:company_id,:user_id, :item,:content,:todo_type)");  
        $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("item", $item,PDO::PARAM_STR) ;  
             $stmt->bindParam("content", $content,PDO::PARAM_STR) ;
             $stmt->bindParam("todo_type", $todo_type,PDO::PARAM_STR) ;
             
             $stmt->execute();
             $task_id=$db->lastInsertId();
             $db = null;
             return true;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
     }


     public function updateTodo($company_id,$user_id,$id,$type_todo){
      try{
        $db = getDB();
        $stmt = $db->prepare("UPDATE `onoffice_todo` SET `task`=:type_todo 
        WHERE company_id=:company_id AND id=:id");  
        $stmt->bindParam("company_id", $company_id,PDO::PARAM_INT) ;  
             $stmt->bindParam("id", $id,PDO::PARAM_INT) ;  
             $stmt->bindParam("type_todo", $type_todo,PDO::PARAM_STR) ;
             $stmt->execute();
             $task_id=$db->lastInsertId();
             $db = null;
             return true;
        } catch(PDOException $e) {
            echo '{"error":{"text":'. $e->getMessage() .'}}'; 
            }
     }

     /* All User Details of company*/
     public function allUserDetails($cid){
      try{
        $db = getDB();
        $stmt = $db->prepare("SELECT * FROM onoffice WHERE company_id=:cid");  
        $stmt->bindParam("cid", $cid,PDO::PARAM_INT);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $data;
       }
       catch(PDOException $e) {
        echo '{"error":{"text":'. $e->getMessage() .'}}'; 
        }

   }

      /* User Profile Update */
      public function profileUpdate($user_id,$FileUpload1){
        try{
          $db = getDB();
          $stmt = $db->prepare("UPDATE onoffice SET logo=:logo WHERE user_id=:user_id");  
          $stmt->bindParam("user_id", $user_id,PDO::PARAM_INT);
          $stmt->bindParam("logo", $FileUpload1,PDO::PARAM_STR);
          $stmt->execute();
          //$stmt->debugDumpParams();
          
          $user_id=$db->lastInsertId();
          $db = null;
           return true;
         }
         catch(PDOException $e) {
          echo '{"error":{"text":'. $e->getMessage() .'}}'; 
          }

     }
}
?>