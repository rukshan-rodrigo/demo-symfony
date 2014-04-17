<?php

/* GesEnquiryBundle:Enquiry:search.html.twig */
class __TwigTemplate_727171155bbcf28157111f5048727d4e77c1f1c48e853ed411b07c13342dee79 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = $this->env->loadTemplate("GesEnquiryBundle::default_layout.html.twig");

        $this->blocks = array(
            'body' => array($this, 'block_body'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "GesEnquiryBundle::default_layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    public function block_body($context, array $blocks = array())
    {
        // line 4
        echo "<form action=\"";
        echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_search"), "html", null, true);
        echo "\" method=\"post\" ";
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'enctype');
        echo ">
        ";
        // line 5
        echo $this->env->getExtension('form')->renderer->searchAndRenderBlock($this->getContext($context, "form"), 'widget');
        echo "
        <p>
            <button type=\"submit\" class=\"btn\">Search Enquiry</button>
        </p>
    </form>
    ";
        // line 10
        if ($this->getContext($context, "entities")) {
            // line 11
            echo "        <table class=\"table table-striped\">
            <thead>
            <tr>
                <th>Date</th>
                <th>Name</th>
                <th>Enquiry Type</th>
                <th>Enquiry Level</th>
                <th>Department</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            ";
            // line 24
            $context['_parent'] = (array) $context;
            $context['_seq'] = twig_ensure_traversable($this->getContext($context, "entities"));
            foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
                // line 25
                echo "                <tr>
                    <td>";
                // line 26
                if ($this->getAttribute($this->getContext($context, "entity"), "enquirydate")) {
                    echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirydate"), "Y-m-d H:i:s"), "html", null, true);
                }
                echo "</td>
                    <td>";
                // line 27
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "familyname"), "html", null, true);
                echo ",";
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "firstname"), "html", null, true);
                echo "</td>
                    <td>";
                // line 28
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirytypeid"), "html", null, true);
                echo "</td>
                    <td>";
                // line 29
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "enquirylevelid"), "html", null, true);
                echo "</td>
                    <td>";
                // line 30
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "departmentid"), "html", null, true);
                echo "</td>
                    <td>";
                // line 31
                if (($this->getAttribute($this->getContext($context, "entity"), "isapproved") == 0)) {
                    echo "Pending";
                }
                if (($this->getAttribute($this->getContext($context, "entity"), "isapproved") == 1)) {
                    echo "Approved";
                }
                echo "</td>
                    <td>
                        <a href=\"";
                // line 33
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_show", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">View</a> | <a
                                href=\"";
                // line 34
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getPath("enquiry_edit", array("id" => $this->getAttribute($this->getContext($context, "entity"), "id"))), "html", null, true);
                echo "\">Edit</a>
                    </td>
                </tr>
                <tr>
                    <td colspan=\"8\"><em>";
                // line 38
                echo twig_escape_filter($this->env, $this->getAttribute($this->getContext($context, "entity"), "description"), "html", null, true);
                echo "</em></td>
                </tr>
            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 41
            echo "            </tbody>
        </table>
    ";
        } else {
            // line 44
            echo "        ";
            if ($this->getContext($context, "search")) {
                // line 45
                echo "            <div class=\"alert warning\"><strong>No data were found according to the search criteria.</strong></div>
        ";
            }
            // line 47
            echo "    ";
        }
    }

    public function getTemplateName()
    {
        return "GesEnquiryBundle:Enquiry:search.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  136 => 47,  132 => 45,  129 => 44,  124 => 41,  115 => 38,  108 => 34,  104 => 33,  94 => 31,  90 => 30,  86 => 29,  82 => 28,  76 => 27,  70 => 26,  67 => 25,  63 => 24,  48 => 11,  46 => 10,  38 => 5,  31 => 4,  28 => 3,);
    }
}
