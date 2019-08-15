<?php

use yii\db\Migration;

/**
 * Class m190814_125334_create_table_user_data
 */
class m190814_125334_create_table_user_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
$sql = "
CREATE TABLE `user_data` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `first_name` varchar(250) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `birth_day` varchar(12) NOT NULL,
  `date_change` int(11) NOT NULL,
  `description` text NOT NULL,
  `save_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=cp1251;
";
        Yii::app()->db->createCommand($sql)->execute();         

$sql = "
ALTER TABLE `user_data`
  ADD UNIQUE KEY `uid` (`uid`),
  ADD KEY `id` (`id`);
  
ALTER TABLE `user_data`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
";
        Yii::app()->db->createCommand($sql)->execute();         
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m190814_125334_create_table_user_data cannot be reverted.\n";
        $this->dropTable('user_data');
        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190814_125334_create_table_user_data cannot be reverted.\n";

        return false;
    }
    */
}
