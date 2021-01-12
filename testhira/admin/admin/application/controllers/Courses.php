<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Courses extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
			
		
			$data['title'] = "Courses";
			$this->load->view('courses', $data);
		
		
	}
	
	public function manual_drafting(){
	
		
			$data['title'] = "CADDLanka - Manual Drafting";
			$this->load->view('manual-drafting', $data);
	}
	
	public function auto_cad_2d(){
		
			$data['title'] = "CADDLanka - Auto CAD 2D + 3D ";
			$this->load->view('auto_cad_2D', $data);
	} 
	
	public function revit_architecture(){
		
			$data['title'] = "CADDLanka - Revit Architecture ";
			$this->load->view('revit-architecture', $data);
	} 
	
	public function three_ds_max(){
		
			$data['title'] = "CADDLanka - 3ds MAX";
			$this->load->view('three-ds-max', $data);
	} 
	
	public function sap_2000(){
		
			$data['title'] = "CADDLanka - SAP 2000";
			$this->load->view('sap-2000', $data);
	}
	public function staad_pro(){
		
			$data['title'] = "CADDLanka - STAAD.Pro";
			$this->load->view('staad-pro', $data);
	}
	public function etabs(){
		
			$data['title'] = "CADDLanka - Etabs";
			$this->load->view('etabs', $data);
	}   
	public function auto_cad_civil_3d(){
		
			$data['title'] = "CADDLanka - AutoCAD Civil 3d";
			$this->load->view('auto-cad-civil-3d', $data);
	} 
	public function solidworks(){
		
			$data['title'] = "CADDLanka - Solidworks";
			$this->load->view('solidworks', $data);
	}
	public function ptc_creo(){
		
			$data['title'] = "CADDLanka - PTC Creo";
			$this->load->view('ptc-creo', $data);
	}
	public function auto_cad_mep(){
		
			$data['title'] = "CADDLanka - AutoCAD MEP";
			$this->load->view('auto_cad_mep', $data);
	} 
	public function revit_mep(){
		
			$data['title'] = "CADDLanka - Revit MEP";
			$this->load->view('revit-mep', $data);
	} 
	public function basic_quantity_surveying (){
		
			$data['title'] = "CADDLanka - Basic Quantity Surveying ";
			$this->load->view('basic-quantity-surveying', $data);
	}
	public function mep_qs(){
			$data['title'] = "CADDLanka - MEP QS";
			$this->load->view('mep_qs', $data);
	} 
	public function autodesk_navisworks (){
			$data['title'] = "CADDLanka - Autodesk Navisworks ";
			$this->load->view('autodesk-navisworks', $data);
	} 
	public function autoCAD_electrical (){
			$data['title'] = "CADDLanka - AutoCAD Electrical";
			$this->load->view('autoCAD-electrical', $data);
	} 
	public function oracle_primavera(){
			$data['title'] = "CADDLanka - Oracle Primavera";
			$this->load->view('oracle-primavera', $data);
	} 
	public function ms_project_concepts(){
			$data['title'] = "CADDLanka - MS Project + Concepts ";
			$this->load->view('ms-project-concepts', $data);
	} 
	public function professional_in_project_planning_and_management (){
			$data['title'] = "CADDLanka - Professional in Project Planning and Management ";
			$this->load->view('professional-in-project-planning-and-management', $data);
	} 
	
	public function Ccourse(){
			$data['title'] = "CADDLanka - Certificet Courses";
			$this->load->view('Ccourse', $data);
	}

	public function Dprograms(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('Dprograms', $data);
	}
	
	public function Pprograms(){
			$data['title'] = "CADDLanka - Professinal Programs";
			$this->load->view('Pprograms', $data);
	}
	   
	   public function DinCAD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinCAD', $data);
	}
	     public function DinArchiCADD1(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinArchiCADD1', $data);
	}
	
	  public function DinArchiCADD2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinArchiCADD2', $data);
	}
	
	 public function DinMechCADD1(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinMechCADD1', $data);
	}
	 
	 public function DinMechCADD2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinMechCADD2', $data);
	}
	
	public function DinCiviCADD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinCiviCADD', $data);
	}
	public function DinProMng1(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinProMng1', $data);
	}
	
	public function DinProMng2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinProMng2', $data);
	}
	
	public function DinInterDesign(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinInterDesign', $data);
	}
	
	public function Din2DGra(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('Din2DGra', $data);
	}
	
	public function DinGrapDesign(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinGrapDesign', $data);
	}
	
	public function DinBuildDesign(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinBuildDesign', $data);
	}
	
	public function DinElecCADD1(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinElecCADD1', $data);
	}
	
	public function DinElecCADD2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinElecCADD2', $data);
	}
	
	public function DinProMng(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('DinProMng', $data);
	}
	
	public function ProInArchiCADD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInArchiCADD', $data);
	}
	
	public function ProInMechCADD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInMechCADD', $data);
	}
	
	public function ProInCivilCADD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInCivilCADD', $data);
	}
	
	public function ProInProMng(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInProMng', $data);
	}
	
	public function ProIn2DGrap(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProIn2DGrap', $data);
	}
	
	public function ProInStrucDesign(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInStrucDesign', $data);
	}
	
	public function ProInBuildDesign1(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInBuildDesign1', $data);
	}
	
	public function ProInBuildDesign2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInBuildDesign2', $data);
	}
	
	public function ProInBuildDesign3(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInBuildDesign3', $data);
	}
	
	public function ProInBuildDesign4(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInBuildDesign4', $data);
	}
	
	public function ProInBuildDesign5(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInBuildDesign5', $data);
	}
	
	public function ProInElecCADD(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInElecCADD', $data);
	}
	
	public function ProInProMngmnt(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInProMngmnt', $data);
	}
	
	public function ProInMechCADD2(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('ProInMechCADD2', $data);
	}
	
	public function auto_cad_3D(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('auto_cad_3D', $data);
	}
	
	public function microsoft_proj(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('microsoft_proj', $data);
	}
	
	public function max_eng(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('max_eng', $data);
	}
	
	public function coreldraw(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('coreldraw', $data);
	}
	
	public function photoshop(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('photoshop', $data);
	}
	
	public function flash(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('flash', $data);
	}
	
	public function indesign(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('indesign', $data);
	}
	
	public function prim_complete(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('prim_complete', $data);
	}
	
	public function microstation(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('microstation', $data);
	}
	
	public function dreamweaver(){
			$data['title'] = "CADDLanka - Diploma Programs";
			$this->load->view('dreamweaver', $data);
	}
	
	
	   
	   
	    
	    
	

	
	
}
