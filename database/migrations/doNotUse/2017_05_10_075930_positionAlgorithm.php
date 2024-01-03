<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PositionAlgorithm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = "

        DROP PROCEDURE IF EXISTS update_user_repo;

        CREATE PROCEDURE `update_user_repo`(IN `userid` INT(11), IN `sponsor_id` INT(11), IN `parent_id` INT(11))

        BEGIN

        DECLARE plevel INT;
        DECLARE parent INT;
        DECLARE splevel INT;
        DECLARE sponsor INT;
        DECLARE result INT;
        DECLARE children INT;
        DECLARE sponserEntries INT;
        DECLARE queryStmt TEXT;

        SET @queryStmt = CONCAT('SELECT LHS INTO @result FROM user_repo WHERE user_id = ',userid);

        PREPARE stmt FROM @queryStmt;
        EXECUTE stmt;
        DEALLOCATE PREPARE stmt;
        SELECT @result;

        IF(@result < 1) THEN

            SET @queryStmt = CONCAT('SELECT COUNT(*) INTO @children FROM user_repo WHERE user_id != ',userid,' AND parent_id = ', parent_id);

            PREPARE stmt FROM @queryStmt;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;


            IF (@children < 1) THEN
            
                SET @parent = parent_id;

                SELECT @myPosition := LHS, @user_level := user_level FROM user_repo WHERE user_id = @parent;
                
                SELECT @myPosition;

                SET @plevel = @user_level+1;

            ELSE 

                SET @queryStmt = CONCAT('SELECT max(user_id) INTO @parent FROM user_repo WHERE user_id != ',userid,' AND parent_id = ', parent_id);

                PREPARE stmt FROM @queryStmt;
                EXECUTE stmt;
                DEALLOCATE PREPARE stmt;

                SELECT @myPosition := RHS, @user_level := user_level FROM user_repo WHERE user_id =  @parent;

                SET @plevel = @user_level;

            END IF;

            UPDATE user_repo SET RHS = RHS + 2 WHERE RHS > @myPosition;
            UPDATE user_repo SET LHS = LHS + 2 WHERE LHS > @myPosition;

            SET @queryStmt = CONCAT('SELECT COUNT(*) INTO @sponserEntries FROM user_repo WHERE user_id != ',userid,' AND `sponsor_id` = ',  sponsor_id);

            PREPARE stmt FROM @queryStmt;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;

            IF @sponserEntries > 0 THEN
              
                SET @queryStmt = CONCAT('SELECT max(user_id) INTO @sponsor FROM user_repo WHERE user_id != ',userid,' AND sponsor_id = ', sponsor_id);
                
                PREPARE stmt FROM @queryStmt;
                EXECUTE stmt;
                DEALLOCATE PREPARE stmt;

                SELECT @mySpPosition := SRHS, @sp_user_level := sp_user_level FROM user_repo WHERE user_id != ',userid,' AND user_id = @sponsor;
                SET @splevel = @sp_user_level;

            ELSE

                SET @sponsor = sponsor_id;
                SELECT @mySpPosition := SLHS, @sp_user_level := sp_user_level FROM user_repo WHERE user_id != ',userid,' AND user_id = @sponsor;
                SET @splevel = @sp_user_level+1;

            END IF;

            UPDATE user_repo SET SRHS = SRHS + 2 WHERE SRHS > @mySpPosition;
            UPDATE user_repo SET SLHS = SLHS + 2 WHERE SLHS > @mySpPosition;

            SET @queryStmt = CONCAT('UPDATE user_repo SET `LHS` = @myPosition + 1, `RHS` = @myPosition + 2, `user_level` = @plevel, `SLHS` = @mySpPosition + 1 ,`SRHS` = @mySpPosition + 2, `sp_user_level` =  @splevel WHERE user_id = ', userid);

            PREPARE stmt FROM @queryStmt;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;

        END IF;

        END";

        //DB::unprepared($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $sql = "DROP PROCEDURE IF EXISTS `add_user_to_repo`";
        //DB::unprepared($sql);
    }
}
