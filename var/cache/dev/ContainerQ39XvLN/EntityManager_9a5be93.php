<?php

namespace ContainerQ39XvLN;
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'persistence'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'Persistence'.\DIRECTORY_SEPARATOR.'ObjectManager.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManagerInterface.php';
include_once \dirname(__DIR__, 4).''.\DIRECTORY_SEPARATOR.'vendor'.\DIRECTORY_SEPARATOR.'doctrine'.\DIRECTORY_SEPARATOR.'orm'.\DIRECTORY_SEPARATOR.'lib'.\DIRECTORY_SEPARATOR.'Doctrine'.\DIRECTORY_SEPARATOR.'ORM'.\DIRECTORY_SEPARATOR.'EntityManager.php';

class EntityManager_9a5be93 extends \Doctrine\ORM\EntityManager implements \ProxyManager\Proxy\VirtualProxyInterface
{

    /**
     * @var \Doctrine\ORM\EntityManager|null wrapped object, if the proxy is initialized
     */
    private $valueHolder39409 = null;

    /**
     * @var \Closure|null initializer responsible for generating the wrapped object
     */
    private $initializer7c0be = null;

    /**
     * @var bool[] map of public properties of the parent class
     */
    private static $publicPropertiesd81d0 = [
        
    ];

    public function getConnection()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getConnection', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getConnection();
    }

    public function getMetadataFactory()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getMetadataFactory', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getMetadataFactory();
    }

    public function getExpressionBuilder()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getExpressionBuilder', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getExpressionBuilder();
    }

    public function beginTransaction()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'beginTransaction', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->beginTransaction();
    }

    public function getCache()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getCache', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getCache();
    }

    public function transactional($func)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'transactional', array('func' => $func), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->transactional($func);
    }

    public function commit()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'commit', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->commit();
    }

    public function rollback()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'rollback', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->rollback();
    }

    public function getClassMetadata($className)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getClassMetadata', array('className' => $className), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getClassMetadata($className);
    }

    public function createQuery($dql = '')
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'createQuery', array('dql' => $dql), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->createQuery($dql);
    }

    public function createNamedQuery($name)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'createNamedQuery', array('name' => $name), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->createNamedQuery($name);
    }

    public function createNativeQuery($sql, \Doctrine\ORM\Query\ResultSetMapping $rsm)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'createNativeQuery', array('sql' => $sql, 'rsm' => $rsm), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->createNativeQuery($sql, $rsm);
    }

    public function createNamedNativeQuery($name)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'createNamedNativeQuery', array('name' => $name), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->createNamedNativeQuery($name);
    }

    public function createQueryBuilder()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'createQueryBuilder', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->createQueryBuilder();
    }

    public function flush($entity = null)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'flush', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->flush($entity);
    }

    public function find($className, $id, $lockMode = null, $lockVersion = null)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'find', array('className' => $className, 'id' => $id, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->find($className, $id, $lockMode, $lockVersion);
    }

    public function getReference($entityName, $id)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getReference', array('entityName' => $entityName, 'id' => $id), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getReference($entityName, $id);
    }

    public function getPartialReference($entityName, $identifier)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getPartialReference', array('entityName' => $entityName, 'identifier' => $identifier), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getPartialReference($entityName, $identifier);
    }

    public function clear($entityName = null)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'clear', array('entityName' => $entityName), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->clear($entityName);
    }

    public function close()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'close', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->close();
    }

    public function persist($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'persist', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->persist($entity);
    }

    public function remove($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'remove', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->remove($entity);
    }

    public function refresh($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'refresh', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->refresh($entity);
    }

    public function detach($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'detach', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->detach($entity);
    }

    public function merge($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'merge', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->merge($entity);
    }

    public function copy($entity, $deep = false)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'copy', array('entity' => $entity, 'deep' => $deep), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->copy($entity, $deep);
    }

    public function lock($entity, $lockMode, $lockVersion = null)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'lock', array('entity' => $entity, 'lockMode' => $lockMode, 'lockVersion' => $lockVersion), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->lock($entity, $lockMode, $lockVersion);
    }

    public function getRepository($entityName)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getRepository', array('entityName' => $entityName), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getRepository($entityName);
    }

    public function contains($entity)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'contains', array('entity' => $entity), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->contains($entity);
    }

    public function getEventManager()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getEventManager', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getEventManager();
    }

    public function getConfiguration()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getConfiguration', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getConfiguration();
    }

    public function isOpen()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'isOpen', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->isOpen();
    }

    public function getUnitOfWork()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getUnitOfWork', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getUnitOfWork();
    }

    public function getHydrator($hydrationMode)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getHydrator', array('hydrationMode' => $hydrationMode), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getHydrator($hydrationMode);
    }

    public function newHydrator($hydrationMode)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'newHydrator', array('hydrationMode' => $hydrationMode), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->newHydrator($hydrationMode);
    }

    public function getProxyFactory()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getProxyFactory', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getProxyFactory();
    }

    public function initializeObject($obj)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'initializeObject', array('obj' => $obj), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->initializeObject($obj);
    }

    public function getFilters()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'getFilters', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->getFilters();
    }

    public function isFiltersStateClean()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'isFiltersStateClean', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->isFiltersStateClean();
    }

    public function hasFilters()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'hasFilters', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return $this->valueHolder39409->hasFilters();
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

        $instance->initializer7c0be = $initializer;

        return $instance;
    }

    protected function __construct(\Doctrine\DBAL\Connection $conn, \Doctrine\ORM\Configuration $config, \Doctrine\Common\EventManager $eventManager)
    {
        static $reflection;

        if (! $this->valueHolder39409) {
            $reflection = $reflection ?? new \ReflectionClass('Doctrine\\ORM\\EntityManager');
            $this->valueHolder39409 = $reflection->newInstanceWithoutConstructor();
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);

        }

        $this->valueHolder39409->__construct($conn, $config, $eventManager);
    }

    public function & __get($name)
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__get', ['name' => $name], $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        if (isset(self::$publicPropertiesd81d0[$name])) {
            return $this->valueHolder39409->$name;
        }

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder39409;

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

        $targetObject = $this->valueHolder39409;
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
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__set', array('name' => $name, 'value' => $value), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder39409;

            $targetObject->$name = $value;

            return $targetObject->$name;
        }

        $targetObject = $this->valueHolder39409;
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
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__isset', array('name' => $name), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder39409;

            return isset($targetObject->$name);
        }

        $targetObject = $this->valueHolder39409;
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
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__unset', array('name' => $name), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        $realInstanceReflection = new \ReflectionClass('Doctrine\\ORM\\EntityManager');

        if (! $realInstanceReflection->hasProperty($name)) {
            $targetObject = $this->valueHolder39409;

            unset($targetObject->$name);

            return;
        }

        $targetObject = $this->valueHolder39409;
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
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__clone', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        $this->valueHolder39409 = clone $this->valueHolder39409;
    }

    public function __sleep()
    {
        $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, '__sleep', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;

        return array('valueHolder39409');
    }

    public function __wakeup()
    {
        \Closure::bind(function (\Doctrine\ORM\EntityManager $instance) {
            unset($instance->config, $instance->conn, $instance->metadataFactory, $instance->unitOfWork, $instance->eventManager, $instance->proxyFactory, $instance->repositoryFactory, $instance->expressionBuilder, $instance->closed, $instance->filterCollection, $instance->cache);
        }, $this, 'Doctrine\\ORM\\EntityManager')->__invoke($this);
    }

    public function setProxyInitializer(\Closure $initializer = null) : void
    {
        $this->initializer7c0be = $initializer;
    }

    public function getProxyInitializer() : ?\Closure
    {
        return $this->initializer7c0be;
    }

    public function initializeProxy() : bool
    {
        return $this->initializer7c0be && ($this->initializer7c0be->__invoke($valueHolder39409, $this, 'initializeProxy', array(), $this->initializer7c0be) || 1) && $this->valueHolder39409 = $valueHolder39409;
    }

    public function isProxyInitialized() : bool
    {
        return null !== $this->valueHolder39409;
    }

    public function getWrappedValueHolderValue()
    {
        return $this->valueHolder39409;
    }


}

if (!\class_exists('EntityManager_9a5be93', false)) {
    \class_alias(__NAMESPACE__.'\\EntityManager_9a5be93', 'EntityManager_9a5be93', false);
}
