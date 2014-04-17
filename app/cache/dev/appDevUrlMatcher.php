<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        // _assetic_bootstrap_css
        if ($pathinfo === '/assetic/bootstrap_css') {
            return array (  '_controller' => 'assetic.controller:render',  'name' => 'bootstrap_css',  'pos' => NULL,  '_route' => '_assetic_bootstrap_css',);
        }

        // _welcome
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', '_welcome');
            }

            return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DefaultController::indexAction',  '_route' => '_welcome',);
        }

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                if (0 === strpos($pathinfo, '/_profiler/i')) {
                    // _profiler_info
                    if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                    }

                    // _profiler_import
                    if ($pathinfo === '/_profiler/import') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:importAction',  '_route' => '_profiler_import',);
                    }

                }

                // _profiler_export
                if (0 === strpos($pathinfo, '/_profiler/export') && preg_match('#^/_profiler/export/(?P<token>[^/\\.]++)\\.txt$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_export')), array (  '_controller' => 'web_profiler.controller.profiler:exportAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // ges_enquiry_homepage
        if ($pathinfo === '/hello') {
            return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DefaultController::indexAction',  '_route' => 'ges_enquiry_homepage',);
        }

        if (0 === strpos($pathinfo, '/log')) {
            if (0 === strpos($pathinfo, '/login')) {
                // fos_user_security_login
                if ($pathinfo === '/login') {
                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::loginAction',  '_route' => 'fos_user_security_login',);
                }

                // fos_user_security_check
                if ($pathinfo === '/login_check') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_security_check;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::checkAction',  '_route' => 'fos_user_security_check',);
                }
                not_fos_user_security_check:

            }

            // fos_user_security_logout
            if ($pathinfo === '/logout') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\SecurityController::logoutAction',  '_route' => 'fos_user_security_logout',);
            }

        }

        if (0 === strpos($pathinfo, '/profile')) {
            // fos_user_profile_show
            if (rtrim($pathinfo, '/') === '/profile') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_fos_user_profile_show;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'fos_user_profile_show');
                }

                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::showAction',  '_route' => 'fos_user_profile_show',);
            }
            not_fos_user_profile_show:

            // fos_user_profile_edit
            if ($pathinfo === '/profile/edit') {
                return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ProfileController::editAction',  '_route' => 'fos_user_profile_edit',);
            }

        }

        if (0 === strpos($pathinfo, '/re')) {
            if (0 === strpos($pathinfo, '/register')) {
                // fos_user_registration_register
                if (rtrim($pathinfo, '/') === '/register') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'fos_user_registration_register');
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::registerAction',  '_route' => 'fos_user_registration_register',);
                }

                if (0 === strpos($pathinfo, '/register/c')) {
                    // fos_user_registration_check_email
                    if ($pathinfo === '/register/check-email') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_fos_user_registration_check_email;
                        }

                        return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::checkEmailAction',  '_route' => 'fos_user_registration_check_email',);
                    }
                    not_fos_user_registration_check_email:

                    if (0 === strpos($pathinfo, '/register/confirm')) {
                        // fos_user_registration_confirm
                        if (preg_match('#^/register/confirm/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirm;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_registration_confirm')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmAction',));
                        }
                        not_fos_user_registration_confirm:

                        // fos_user_registration_confirmed
                        if ($pathinfo === '/register/confirmed') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_fos_user_registration_confirmed;
                            }

                            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\RegistrationController::confirmedAction',  '_route' => 'fos_user_registration_confirmed',);
                        }
                        not_fos_user_registration_confirmed:

                    }

                }

            }

            if (0 === strpos($pathinfo, '/resetting')) {
                // fos_user_resetting_request
                if ($pathinfo === '/resetting/request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_request;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::requestAction',  '_route' => 'fos_user_resetting_request',);
                }
                not_fos_user_resetting_request:

                // fos_user_resetting_send_email
                if ($pathinfo === '/resetting/send-email') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_fos_user_resetting_send_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::sendEmailAction',  '_route' => 'fos_user_resetting_send_email',);
                }
                not_fos_user_resetting_send_email:

                // fos_user_resetting_check_email
                if ($pathinfo === '/resetting/check-email') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_fos_user_resetting_check_email;
                    }

                    return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::checkEmailAction',  '_route' => 'fos_user_resetting_check_email',);
                }
                not_fos_user_resetting_check_email:

                // fos_user_resetting_reset
                if (0 === strpos($pathinfo, '/resetting/reset') && preg_match('#^/resetting/reset/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_fos_user_resetting_reset;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'fos_user_resetting_reset')), array (  '_controller' => 'FOS\\UserBundle\\Controller\\ResettingController::resetAction',));
                }
                not_fos_user_resetting_reset:

            }

        }

        // fos_user_change_password
        if ($pathinfo === '/profile/change-password') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_fos_user_change_password;
            }

            return array (  '_controller' => 'FOS\\UserBundle\\Controller\\ChangePasswordController::changePasswordAction',  '_route' => 'fos_user_change_password',);
        }
        not_fos_user_change_password:

        if (0 === strpos($pathinfo, '/department')) {
            // department
            if (rtrim($pathinfo, '/') === '/department') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_department;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'department');
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::indexAction',  '_route' => 'department',);
            }
            not_department:

            // department_create
            if ($pathinfo === '/department/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_department_create;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::createAction',  '_route' => 'department_create',);
            }
            not_department_create:

            // department_new
            if ($pathinfo === '/department/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_department_new;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::newAction',  '_route' => 'department_new',);
            }
            not_department_new:

            // department_show
            if (preg_match('#^/department/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_department_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'department_show')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::showAction',));
            }
            not_department_show:

            // department_edit
            if (preg_match('#^/department/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_department_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'department_edit')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::editAction',));
            }
            not_department_edit:

            // department_update
            if (preg_match('#^/department/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_department_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'department_update')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::updateAction',));
            }
            not_department_update:

            // department_delete
            if (preg_match('#^/department/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_department_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'department_delete')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\DepartmentController::deleteAction',));
            }
            not_department_delete:

        }

        if (0 === strpos($pathinfo, '/enquiry')) {
            // enquiry
            if (rtrim($pathinfo, '/') === '/enquiry') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_enquiry;
                }

                if (substr($pathinfo, -1) !== '/') {
                    return $this->redirect($pathinfo.'/', 'enquiry');
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::indexAction',  '_route' => 'enquiry',);
            }
            not_enquiry:

            // enquiry_create
            if ($pathinfo === '/enquiry/') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_enquiry_create;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::createAction',  '_route' => 'enquiry_create',);
            }
            not_enquiry_create:

            // enquiry_new
            if ($pathinfo === '/enquiry/new') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_enquiry_new;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::newAction',  '_route' => 'enquiry_new',);
            }
            not_enquiry_new:

            // enquiry_search
            if ($pathinfo === '/enquiry/search') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_enquiry_search;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::searchAction',  '_route' => 'enquiry_search',);
            }
            not_enquiry_search:

            // enquiry_download
            if ($pathinfo === '/enquiry/download') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_enquiry_download;
                }

                return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::downloadAction',  '_route' => 'enquiry_download',);
            }
            not_enquiry_download:

            // enquiry_show
            if (preg_match('#^/enquiry/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_enquiry_show;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_show')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::showAction',));
            }
            not_enquiry_show:

            // enquiry_edit
            if (preg_match('#^/enquiry/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_enquiry_edit;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_edit')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::editAction',));
            }
            not_enquiry_edit:

            // enquiry_update
            if (preg_match('#^/enquiry/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'PUT') {
                    $allow[] = 'PUT';
                    goto not_enquiry_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_update')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::updateAction',));
            }
            not_enquiry_update:

            // enquiry_delete
            if (preg_match('#^/enquiry/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'DELETE') {
                    $allow[] = 'DELETE';
                    goto not_enquiry_delete;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_delete')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::deleteAction',));
            }
            not_enquiry_delete:

            // enquiry_notify
            if (preg_match('#^/enquiry/(?P<id>[^/]++)/notify$#s', $pathinfo, $matches)) {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_enquiry_notify;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_notify')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::notifyAction',));
            }
            not_enquiry_notify:

            // enquiry_sendnotify
            if (preg_match('#^/enquiry/(?P<id>[^/]++)/sendnotify$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquiry_sendnotify')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryController::sendnotifyAction',));
            }

            if (0 === strpos($pathinfo, '/enquirylevel')) {
                // enquirylevel
                if (rtrim($pathinfo, '/') === '/enquirylevel') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirylevel;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'enquirylevel');
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::indexAction',  '_route' => 'enquirylevel',);
                }
                not_enquirylevel:

                // enquirylevel_create
                if ($pathinfo === '/enquirylevel/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_enquirylevel_create;
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::createAction',  '_route' => 'enquirylevel_create',);
                }
                not_enquirylevel_create:

                // enquirylevel_new
                if ($pathinfo === '/enquirylevel/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirylevel_new;
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::newAction',  '_route' => 'enquirylevel_new',);
                }
                not_enquirylevel_new:

                // enquirylevel_show
                if (preg_match('#^/enquirylevel/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirylevel_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirylevel_show')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::showAction',));
                }
                not_enquirylevel_show:

                // enquirylevel_edit
                if (preg_match('#^/enquirylevel/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirylevel_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirylevel_edit')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::editAction',));
                }
                not_enquirylevel_edit:

                // enquirylevel_update
                if (preg_match('#^/enquirylevel/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_enquirylevel_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirylevel_update')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::updateAction',));
                }
                not_enquirylevel_update:

                // enquirylevel_delete
                if (preg_match('#^/enquirylevel/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_enquirylevel_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirylevel_delete')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryLevelController::deleteAction',));
                }
                not_enquirylevel_delete:

            }

            if (0 === strpos($pathinfo, '/enquirytype')) {
                // enquirytype
                if (rtrim($pathinfo, '/') === '/enquirytype') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirytype;
                    }

                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'enquirytype');
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::indexAction',  '_route' => 'enquirytype',);
                }
                not_enquirytype:

                // enquirytype_create
                if ($pathinfo === '/enquirytype/') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_enquirytype_create;
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::createAction',  '_route' => 'enquirytype_create',);
                }
                not_enquirytype_create:

                // enquirytype_new
                if ($pathinfo === '/enquirytype/new') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirytype_new;
                    }

                    return array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::newAction',  '_route' => 'enquirytype_new',);
                }
                not_enquirytype_new:

                // enquirytype_show
                if (preg_match('#^/enquirytype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirytype_show;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirytype_show')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::showAction',));
                }
                not_enquirytype_show:

                // enquirytype_edit
                if (preg_match('#^/enquirytype/(?P<id>[^/]++)/edit$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_enquirytype_edit;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirytype_edit')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::editAction',));
                }
                not_enquirytype_edit:

                // enquirytype_update
                if (preg_match('#^/enquirytype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_enquirytype_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirytype_update')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::updateAction',));
                }
                not_enquirytype_update:

                // enquirytype_delete
                if (preg_match('#^/enquirytype/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'DELETE') {
                        $allow[] = 'DELETE';
                        goto not_enquirytype_delete;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'enquirytype_delete')), array (  '_controller' => 'Ges\\EnquiryBundle\\Controller\\EnquiryTypeController::deleteAction',));
                }
                not_enquirytype_delete:

            }

        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
