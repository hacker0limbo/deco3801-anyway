<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Checker</title>

    <link href="<?php echo base_url(); ?>assets/css/jquery-steps/css/jquery.steps.css" rel="stylesheet">
    <!-- Custom Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/css/jquery-steps/style.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/select2/css/select2.min.css">
    
</head>
<body>
    <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h2>Welcome to Symptom Checker</h2>
                                <form action="#" id="step-form-horizontal" class="step-form-horizontal">
                                    <div>
                                        <h4>Patient's Info</h4>
                                        <section>
                                            <div class="row">
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">First Name*</label>
                                                        <input type="text" name="firstName" class="form-control" placeholder="Patient's firstname" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Last Name*</label>
                                                        <input type="text" name="lastName" class="form-control" placeholder="Patient's lastname" required>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Gender</label>
                                                        <div class="col-lg-9">
                                                <select class="form-control">
                                                    <option class="text-muted" disabled selected style="display: none">Choose the gender of the patient</option>
                                                    <option>Male</option>
                                                    <option>FeMale</option>
                                                    <option>Other</option>
                                                </select>
                                            </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Phone Number*</label>
                                                        <div class="input-group">
                                                            <input type="text" name="phoneNumber" class="form-control border-right-0" placeholder="(+1)408-657-9007" required>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text bg-transparent" id="inputGroupPrepend5"> <i class="fa fa-phone" aria-hidden="true"></i> </span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Where are you from*</label>
                                                        <input type="text" name="place" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </section>
                                        <h4>Choose a symptom</h4>
                                        <section>
                                        <div class="col-xl-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="mb-4">
                                    <h4 class="card-title">Please select your symptoms</h4>
                                    
                                </div>
                                <div class="col-lg-12 mb-4">
                                <select class="dropdown-groups">
                                    <option>Choose symptoms according to body position</option>
                                    <optgroup label="Head">
                                        <option>Dizziness</option>
                                        <option>Eye discomfort and redness</option>
                                        
                                        <option>Toothache</option>
                                    </optgroup>
                                    <optgroup label="Chest">
                                        <option>Chest tightness</option>
                                        <option>Heart palpitations</option>
                                        <option>Distressed</option>
                                    </optgroup>
                                    <optgroup label="Abdomen">
                                        <option>Diarrhea</option>
                                        <option>Blood in stool</option>
                                        <option>Constipation</option>
                                    </optgroup>
                                    <optgroup label="Arms and Legs">
                                        <option>Neck pain</option>
                                        <option>Shoulder pain</option>
                                        <option>Knee pain</option>
                                        <option>Foot swelling or leg swelling</option>
                                        <option>Foot pain</option>
                                    </optgroup>
                                    <optgroup label="Other">
                                        <option>Sore throat</option>
                                        <option>Urinary problems</option>
                                        <option>Wheezing</option>
                                        <option>Difficulty swallowing</option>
                                        <option>Nasal congestion</option>
                                    </optgroup>
                                </select>
                            </div>
                        </div></div>
                    </div>
                    <div class="col-lg-12 mb-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Symptoms type</label>
                                                        <div class="col-lg-9">
                                                <select class="form-control">
                                                    <option class="text-muted" disabled selected style="display: none">Choose whether the patient is an adult or a child</option>
                                                    <option>Adult</option>
                                                    <option>Child</option>
                                                </select>
                                            </div>
                                                    </div>
                                                </div>
                                                
                                        </section>
                                        <h4>Select related factors</h4>
                                        <section>
                                        <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="text-label">Problem is</label>
                                                        <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox1" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox1" class="form-check-label">Ongoing or recurrent (weeks to years)</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox2" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox2" class="form-check-label">Sudden (hours to days)</label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="text-label">Preceded by</label>
                                                        <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox4" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox4" class="form-check-label">Eating suspect food</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox5" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox5" class="form-check-label">Recent antibiotic use</label>
                                            </div>
                                            
                                        </div>

                                        <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="text-label">Triggered or worsened by</label>
                                                        <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox6" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox6" class="form-check-label">Eating certain foods</label>
                                            </div>
                                            
                                        </div>
                                        <div class="col-xs-6">
                                                    <div class="form-group">
                                                        <label class="text-label">Relieved by</label>
                                                        <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox7" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox7" class="form-check-label">Avoiding certain foods</label>
                                            </div>
                                            
                                        </div>

                                        <div class="col-xs-4">
                                                    <div class="form-group">
                                                        <label class="text-label">Accompanied by</label>
                                                        <div class="form-group">
                                            <div class="form-check">
                                                <input id="checkbox8" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox8" class="form-check-label">Abdominal pain or cramping</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox9" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox9" class="form-check-label">Bloating or abdominal swelling</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox10" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox10" class="form-check-label">Bloody stools</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox11" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox11" class="form-check-label">Constipation</label>
                                            </div>
                                            <div class="form-check">
                                                <input id="checkbox12" class="form-check-input styled-checkbox" type="checkbox">
                                                <label for="checkbox12" class="form-check-label">Fever</label>
                                            </div>
                                        </div>
                                     
                                        </section>
                                        <h4>View possible causes</h4>
                                        <section>
                                        <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">According to the symptoms, the patients may get the following diseases:</h4>
                                <p class="text-muted"><code></code>
                                </p>
                                <div id="accordion-one" class="accordion">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0" data-toggle="collapse" data-target="#collapseOne"
                                                aria-expanded="true" aria-controls="collapseOne"><i class="fa"
                                                    aria-hidden="true"></i> Celiac disease</h5>
                                        </div>
                                        <div id="collapseOne" class="collapse show" data-parent="#accordion-one">
                                            <div class="card-body"><strong>Problem is ongoing or recurrent (weeks to years)</strong><br>
                                            <strong>Accompanied by abdominal pain or cramping</strong><br>
                                            <strong>Triggered or worsened by eating certain foods</strong><br>
                                            Relieved by avoiding certain foods<br>
                                            Accompanied by bloating or abdominal swelling<br>
                                            Accompanied by muscle or joint aches<br>
                                            Accompanied by unintended weight loss</div>
                                        </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseTwo"
                                                aria-expanded="false" aria-controls="collapseTwo"><i class="fa"
                                                    aria-hidden="true"></i> Crohn's disease</h5>
                                        </div>
                                        <div id="collapseTwo" class="collapse" data-parent="#accordion-one">
                                        <div class="card-body"><strong>Problem is ongoing or recurrent (weeks to years)</strong><br>
                                        <strong>Accompanied by abdominal pain or cramping</strong><br>
                                        <strong>Accompanied by bloody stools</strong><br>
                                        Accompanied by fever<br>
                                        Accompanied by muscle or joint aches<br>
                                        Accompanied by nausea or vomiting<br>
                                        Accompanied by unintended weight loss</div>
                                    </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree"><i class="fa"
                                                    aria-hidden="true"></i> Accordion Header Tne</h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion-one">
                                        <div class="card-body">Preceded by eating suspect food<br>
                                            Accompanied by abdominal pain or cramping<br>
                                            Problem is sudden (hours to days)<br>
                                            Accompanied by fever<br>
                                            Accompanied by nausea or vomiting</div>
                                    </div>
                                    </div>
                                    <div class="card">
                                        <div class="card-header">
                                            <h5 class="mb-0 collapsed" data-toggle="collapse" data-target="#collapseThree"
                                                aria-expanded="false" aria-controls="collapseThree"><i class="fa"
                                                    aria-hidden="true"></i> Irritable bowel syndrome</h5>
                                        </div>
                                        <div id="collapseThree" class="collapse" data-parent="#accordion-one">
                                        <div class="card-body">Problem is ongoing or recurrent (weeks to years)<br>
                                            Accompanied by abdominal pain or cramping<br>
                                            Triggered or worsened by eating certain foods<br>
                                            Accompanied by constipation<br>
                                            Accompanied by mucus in stools<br>
                                            Accompanied by passing gas</div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                                        </section>
                                    </div>
                                </form>
                            </div>
    <script src="<?php echo base_url(); ?>assets/common/common.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/jquery-steps/build/jquery.steps.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/jquery-validation/jquery.validate.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/jquery-steps-init.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/select2/js/select2.full.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/css/select2/js/select2-init.js"></script>


</body>

</html>