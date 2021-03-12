<?php

namespace ContainerJeTqwwK;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder56349 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer88b0e = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesa8c06 = [
        
    ];

    public function getConnection()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getConnection', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getMetadataFactory', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getExpressionBuilder', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'beginTransaction', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getCache', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getCache();
    }

    public function transactional($func)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'transactional', array('func' => $func), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->transactional($func);
    }

    public function commit()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'commit', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->commit();
    }

    public function rollback()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'rollback', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getClassMetadata', array('className' => $className), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'createQuery', array('dql' => $dql), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'createNamedQuery', array('name' => $name), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'createQueryBuilder', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'flush', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'clear', array('entityName' => $entityName), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->clear($entityName);
    }

    public function close()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'close', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->close();
    }

    public function persist($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'persist', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'remove', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'refresh', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'detach', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'merge', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getRepository', array('entityName' => $entityName), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'contains', array('entity' => $entity), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getEventManager', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getConfiguration', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'isOpen', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getUnitOfWork', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getProxyFactory', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'initializeObject', array('obj' => $obj), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'getFilters', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'isFiltersStateClean', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'hasFilters', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return $this->valueHolder56349->hasFilters();
    }

    /**
     * Constructor for lazy initialization
     *
     * @param \Closure|null $initializer
     */
    public static function staticProxyConstructor($initializer)
    {
        static $reflection;

        $reflection = $reflection ?? new \ReflectionClass(__CLASS__);
        $instance   = $reflection->newInstanceWithoutConstructor();

        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $instance, 'Doctrine\\ORM\\EntityManager')->__invoke($instance);

        $instance->initializer88b0e = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder56349) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder56349 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder56349->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__get', ['name' => $name], $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        if (isset(self::$publicPropertiesa8c06[$name])) {
            return $this->valueHolder56349->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56349;

            $backtrace = debug_backtrace(false, 1);
            trigger_error(
                sprintf(
                    'Undefined property: %s::$%s in %s on line %s',
                    $realInstanceReflection->getName(),
                    $name,
                    $backtrace[0]['file'],
                    $backtrace[0]['line']
                ),
                \E_USER_NOTICE
            );
            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder56349;
        $accessor = function & () use ($targetObject, $name) {
            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __set($name, $value)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56349;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder56349;
        $accessor = function & () use ($targetObject, $name, $value) {
            $targetObject->$name = $value;

            return $targetObject->$name;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = & $accessor();

        return $returnValue;
    }

    public function __isset($name)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__isset', array('name' => $name), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56349;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder56349;
        $accessor = function () use ($targetObject, $name) {
            return isset($targetObject->$name);
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $returnValue = $accessor();

        return $returnValue;
    }

    public function __unset($name)
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__unset', array('name' => $name), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder56349;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder56349;
        $accessor = function () use ($targetObject, $name) {
            unset($targetObject->$name);

            return;
        };
        $backtrace = debug_backtrace(true, 2);
        $scopeObject = isset($backtrace[1]['object']) ? $backtrace[1]['object'] : new \ProxyManager\Stub\EmptyClassStub();
        $accessor = $accessor->bindTo($scopeObject, get_class($scopeObject));
        $accessor();
    }

    public function __clone()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__clone', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        $this->valueHolder56349 = clone $this->valueHolder56349;
    }

    public function __sleep()
    {
        $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, '__sleep', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;

        return array('valueHolder56349');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer88b0e = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer88b0e;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer88b0e && ($this->initializer88b0e->__invoke($valueHolder56349, $this, 'initializeProxy', array(), $this->initializer88b0e) || 1) && $this->valueHolder56349 = $valueHolder56349;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder56349;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder56349;
    }


}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
