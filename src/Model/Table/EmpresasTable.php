<?php

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Empresas Model
 *
 * @property \App\Model\Table\CategoriasTable|\Cake\ORM\Association\BelongsTo $Categorias
 *
 * @method \App\Model\Entity\Empresa get($primaryKey, $options = [])
 * @method \App\Model\Entity\Empresa newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Empresa[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Empresa|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Empresa patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Empresa findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EmpresasTable extends Table {

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config) {
        parent::initialize($config);

        $this->setTable('empresas');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
        $this->addBehavior('Sluggable.Sluggable', [
            'pattern' => ':id-:nomeempresa',
        ]);

        $this->belongsTo('Categorias', [
            'foreignKey' => 'categorias_id',
            'joinType' => 'INNER'
        ]);

        $this->belongsTo('Bairros', [
            'foreignKey' => 'bairros_id',
            'joinType' => 'INNER',
            'propertyName' => 'bairro'
        ]);
        $this->hasOne('Users');

        $this->hasMany('Comentarios')
                ->setForeignKey('empresas_id')
                ->setDependent(true);

        // Add the behaviour to your table
        $this->addBehavior('Search.Search');

        $this->addBehavior('Josegonzalez/Upload.Upload', [
            'photo',
        ]);
        // Setup search filter using search manager
        $this->searchManager()
                ->value('id')
                ->add('q', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'fieldMode' => 'OR',
                    'comparison' => 'LIKE',
                    'wildcardAny' => '*',
                    'wildcardOne' => '?',
                    'field' => ['nomeempresa', 'Categorias.nomecategoria', 'Bairros.nomeBairro']
                ])
                ->add('bairro', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'fieldMode' => 'OR',
                    'comparison' => 'LIKE',
                    'wildcardAny' => '*',
                    'wildcardOne' => '?',
                    'field' => ['Bairros.nomeBairro']
                ])
                ->add('categoria', 'Search.Like', [
                    'before' => true,
                    'after' => true,
                    'fieldMode' => 'OR',
                    'comparison' => 'LIKE',
                    'wildcardAny' => '*',
                    'wildcardOne' => '?',
                    'field' => ['Categorias.nomecategoria']
                ])
                ->add('foo', 'Search.Callback', [
                    'callback' => function ($query, $args, $filter) {
                        // Modify $query as required
                    }
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator) {
        $validator
                ->integer('id')
                ->allowEmpty('id', 'create');

        $validator
                ->scalar('nomeempresa')
                ->maxLength('nomeempresa', 255)
                ->requirePresence('nomeempresa', 'create')
                ->notEmpty('nomeempresa');

        $validator
                ->scalar('endereco')
                ->maxLength('endereco', 255)
                ->requirePresence('endereco', 'create')
                ->notEmpty('endereco');

        $validator
                ->integer('numero')
                ->requirePresence('numero', 'create')
                ->notEmpty('numero');

        $validator
                ->scalar('cidade')
                ->maxLength('cidade', 255)
                ->requirePresence('cidade', 'create')
                ->notEmpty('cidade');

        $validator
                ->scalar('cep')
                ->maxLength('cep', 255)
                ->requirePresence('cep', 'create')
                ->notEmpty('cep');

        $validator
                ->scalar('telefone1')
                ->maxLength('telefone1', 20)
                ->allowEmpty('telefone1');

        $validator
                ->scalar('desccurta')
                ->allowEmpty('desccurta')
                ->maxLength('desccurta', 200);

        $validator
                ->allowEmpty('photo');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules) {

        $rules->add($rules->existsIn(['categorias_id'], 'Categorias'));

        return $rules;
    }

}
