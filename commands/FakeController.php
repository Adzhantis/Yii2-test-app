<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\models\Authors;
use app\models\Books;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class FakeController extends Controller
{
    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionBooks()
    {
        $faker = \Faker\Factory::create();

        # ArtclCategory
        for ($i = 0; $i < 5; $i++) {
            $author = new Authors();
            $author->first_name = $faker->word;
            $author->last_name = $faker->word;
            $author->save(false);

            for ($j = 0; $j < 5; $j++) {
                $books = new Books();
                $books->name = $faker->word;
                $books->date_create = strtotime($i + $j .' May');
                $books->date_update = strtotime($i + $j .' May');
                $books->preview = $faker->image('web\img');
                $books->date = strtotime($i + $j .' May');
                $books->save(false);
            }
        }
        echo 'Authors and Books - done!';

    }
}
