<?php



use Zend\ServiceManager\ServiceLocatorAwareInterface;
use Zend\ServiceManager\ServiceLocatorInterface;
use Zend\Authentication\Adapter\AdapterInterface;
use Zend\Authentication\Result;

class My\Auth\Adapter implements AdapterInterface, ServiceLocatorAwareInterface {
	
    private $service_locator;
    private $username;
    private $password;

    public function setServiceLocator(ServiceLocatorInterface $serviceLocator) {
        $this->service_locator = $serviceLocator;
    }

    public function getServiceLocator() {
        return $this->service_locator;
    }

	public function __construct($username, $password){	
		$this->username = $username;
		$this->password = $password;
	}

	/**
     * Performs an authentication attempt
     *
     * @return \Zend\Authentication\Result
     * @throws \Zend\Authentication\Adapter\Exception\ExceptionInterface
     *               If authentication cannot be performed
     */
	public function authenticate(){
		$ldap = $this->service_locator->get('Ldap');
		$result = $ldap->getAuthenticationResponse($this->username, $this->password);

		//do some result returns here
		$result = new Result($code, $identity, $messages);
	}
}