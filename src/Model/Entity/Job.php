<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Job Entity
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property int $type_id
 * @property string $company_name
 * @property string $title
 * @property string $description
 * @property string $city
 * @property string $state
 * @property string $contact_email
 * @property \Cake\I18n\Time $created
 *
 * @property \App\Model\Entity\Category $category
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Type $type
 */
class Job extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        '*' => true,
        'id' => false
    ];
}
