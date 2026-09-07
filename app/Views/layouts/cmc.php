<!DOCTYPE html>
<html lang="en">
<?= view('layouts/head-essential'); ?> 
<body class="skin-dark animate">
    <?php
        $data = [
            'active' => 'cmc',
            'show' => 'cmc',  
        ];
        echo view('layouts/sidebarAdmin',$data)
    ?>
    <div class="content"> 
        <div class="content-header">
            <a id="contentMenu" href="#" class="content-menu d-none d-lg-flex"><i data-feather="menu"></i></a>
            <a id="mobileMenu" href="#" class="content-menu d-lg-none"><i data-feather="menu"></i></a>
        </div>
        
        <div class="content-body">
            <label class="content-label"><b>CMC Conditions</b></label>
            <input type="hidden" id="conditionID">
            <hr>
            <div class="container">
                <div class="row">
                    <div class="input-group">
                        <select class="form-select" id="moduleNumber">
                            <option value="0" selected>Select Module</option>
                            <option value="1">Electronic Balance</option>
                            <option value="2">Thermo-Hygrometer</option>
                            <option value="3">Test Weights</option>
                            <option value="4">Weight Scale</option>
                            <option value="5">Thermometer</option>
                            <option value="6">Digital Timer </option>
                            <option value="7">Pressure Gauge</option>
                            <option value="8">pH Meter</option>
                            <option value="9">Volumetric</option>
                            <option value="10">Temperature Controller</option>
                            <option value="11">Enclosure / Water Bath / Autoclave</option>
                            <!-- <option value="12">water bath / autoclave</option> -->
                            <option value="13">Refractometer</option>
                            <option value="14">Caliper / Micrometer </option>
                            <option value="15">Electrical Meters</option>
                        </select>
                        <button class="btn btn-outline-secondary" type="button" id="btn_select">Select</button>
                    </div>
                   
                </div>
                <div class="row mt-3 d-none" id="cmc_div">
                    <div class="row">
                        <div class="btn-group" role="group">
                            <button type="button" class="btn btn-danger" id="btn_minus">Remove</button>
                            <button type="button" class="btn btn-success" id="btn_add">Add</button>
                            <button type="button" class="btn btn-warning" id="btn_save">Save</button>
                            <button type="button" class="btn btn-warning d-none" id="btn_update">Update</button>
                        </div>
                    </div>
                    <div class="row mt-5">
                        <div style='height:50vh; overflow:scroll'>
                            <table class="table table-striped table-hover" id="cmcTable">
                                <thead></thead>
                                <tbody></tbody>
                            </table>        
                        </div>
                        
                    </div>
                </div>
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div id="toastSaved" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                        <div class="toast-body">
                        Saved
                        </div>
                    </div>
                </div>
                <div class="position-fixed top-0 end-0 p-3" style="z-index: 11">
                    <div id="toastUpdated" class="toast hide d-flex align-items-center text-white bg-success border-0 " role="alert">
                        <div class="toast-body">
                        Updated
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<?= view('layouts/footer-essential'); ?>
<script src="<?= base_url('/js/cmc.js')?>"></script>

</html>