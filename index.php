<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="styles/mainstyle.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Crimson+Pro">
    <title>Overtime Tracking Feature</title>
</head>

<body>

    <h1>Testing of Overtime Tracking UI for v2.1</h1>

    <br>

    <header>
        <nav class="navbar navbar-expand">
            <div class="container-fluid pl-0">

                <ul class="navbar navbar-nav mr-auto" id="mainTopNavbar">
                    <li class="nav-item">
                        <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/MARKETING/dashboard">
                            MARKETING
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/CRM/dashboard">
                            CRM
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/PROJECTS/dashboard">
                            PROJECTS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/HIRE/dashboard">
                            HIRE
                        </a>
                    </li>

                    <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/WORK/dashboard">
                        WORK
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link  " href="https://demo.v2.senegalsoftware.com/LOGISTICS/dashboard">
                            LOGISTICS
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class=" nav-link  active" href="https://demo.v2.senegalsoftware.com/FINANCE/dashboard">
                            FINANCE
                        </a>
                    </li>
                </ul>
                </li>

            </div>
        </nav>
    </header>

    <br>

    <section>
        <div class="main_tabs">
            <div class="container-fluid">
                <div class="main_tabs_inner">
                    <ul class="navbar" id="mainNavbar">
                        <li class="" for_tab="Estimates">
                            <a href="https://demo.v2.senegalsoftware.com/Estimates/list">Estimates
                            </a>
                        </li>
                        <li class="" for_tab="Proposals">
                            <a href="https://demo.v2.senegalsoftware.com/Proposals/list">Proposals
                            </a>
                        </li>
                        <li class="" for_tab="Invoices">
                            <a href="https://demo.v2.senegalsoftware.com/Invoices/list">Invoices
                            </a>
                        </li>
                        <li class="active" for_tab="TalentBill">
                            <a href="https://demo.v2.senegalsoftware.com/TalentBill/list">Talent Bills
                            </a>
                        </li>
                        <li class="" for_tab="Profitability">
                            <a href="https://demo.v2.senegalsoftware.com/Profitability/list">Profitability
                            </a>
                        </li>
                        <li class="" for_tab="Commissions">
                            <a href="https://demo.v2.senegalsoftware.com/Commissions/list">Commissions
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <br>

    <div class="pt-2 pb-3 d-flex align-items-center justify-content-between overflow border_btm">
        <div class="d-flex align-items-center">
            <span class="form-control advanced_filter mr-3 cursor_pointer min_w_auto text-nowrap" data-target="advanced_search_Talents_searchpage"><i class="fal fa-sliders-h mr-2"></i> Filters</span>
            <span id="view_actionscontainer_Talents_searchpage"></span>



        </div>
        <div class="d-flex align-items-center">

            <div class="dropdown  mr-3">
                <div class="form-control d-flex align-items-center cursor_pointer" data-toggle="dropdown">
                    <i class="fal fa-plus mr-3"></i>
                    <p class="mb-0 mr-3 pr-3 border_right text-nowrap">Add Talent</p>
                    <span><i class="fal fa-ellipsis-h"></i></span>

                </div>
                <div class="dropdown-menu">
                    <ul>

                        <a name="create" data-module="Talents" class="dropdown-item" data-createtype="create" href="https://demo.v2.senegalsoftware.com/Talents/create?id=-1&amp;search_id=&amp;parent_module=&amp;parent_id=" data-searchid="">Create</a>

                        <a name="import" data-module="Talents" class="dropdown-item" data-createtype="import" href="https://demo.v2.senegalsoftware.com/Talents/import">Import</a><a name="reviewimport" data-module="Talents" class="dropdown-item" data-createtype="reviewimport" href="https://demo.v2.senegalsoftware.com/Talents/review">Review Import</a>
                    </ul>
                </div>
            </div>


            <div class="select_wrap mr-3">
                <select class="form-control form_additional_options" name="records_per_page" id="records_per_page" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">
                    <option value="10" selected="">10 entries</option>
                </select>
            </div>

            <div id="paginationcontainer_Talents_searchpage">
                <div class="pagination form-control mr-3">
                    <ul class="d-flex">
                        <li>
                            <input class="form_additional_options current_page" name="current_page" data-sort="Talents.date_created" data-sortdir="DESC" id="current_page_Talents_searchpage" data-parent="" data-parentid="" type="text" value="1" data-module="Talents" data-mode="searchpage">
                        </li>
                    </ul>
                </div>
            </div>
            <div class="view_change ml-3" id="view_iconscontainer_Talents_searchpage">
                <!--<div class="icon active" data-toggle="tooltip" title="" data-original-title="List View"><a href="#"><i class="fal fa-bars"></i></a></div>-->
                <div class="icon active" data-toggle="tooltip" title="" data-original-title="List View">
                    <a href="#" data-mode="searchpage" data-module="Talents" data-parent="" data-parentid="" class="" data-viewmode="searchpage">
                        <i class="fal fa-bars"></i>
                    </a>
                </div>

                <!--<div class="icon " data-toggle="tooltip" title="" data-original-title="Grid View"><a href="https://demo.v2.senegalsoftware.com/Talents/grid"><i class="fas fa-border-all"></i></a></div>-->
                <div class="icon " data-toggle="tooltip" title="" data-original-title="Grid View">
                    <a href="#" data-mode="searchpage" data-module="Talents" data-parent="" data-parentid="" class="gridview_button" data-viewmode="gridviewpage">
                        <i class="fas fa-border-all"></i>
                    </a>
                </div>


            </div>

            <input type="hidden" id="viewmode_container_Talents_searchpage" value="" autocomplete="off">

        </div>
    </div>

    <br>

    <!-- <div class="listing_view d-flex">
            <div class="advanced_search bg_gray" id="advanced_search_Talents_searchpage">
    <div class="p-3">
        <input type="hidden" id="select_type_Talents_searchpage" value="" autocomplete="off">
        <form action="" method="get" class="searchform ng-pristine ng-valid" name="SearchForm" id="SearchForm_Talents_searchpage" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">
            <div class="form-group">
                <label>Keyword Search</label>
                <div class="date_input">
                    <input type="text" name="search_term" value="" class="form-control" placeholder="Enter the search term here">
                    <input type="hidden" name="search_term-operator" value="wildcard" autocomplete="off">
                </div>
</div>

            <div class="form-group ">
                <label id="Talents_ID_include_work_cities_label">Include Work Cities?</label>
                <div class="select_wrap">
                    <select name="Talents:include_work_cities" id="Talents_ID_include_work_cities" class="form-control " data-type="crmfield" data-fieldtype="Dropdown" crm-autodisabled="1" data-errormessage="Talents_ID_include_work_cities_errormessage" data-label="Include Work Cities?">
                        <option selected="" value=""></option>
                        <option value="Yes">Yes</option>
                        <option value="">No</option>
                    </select>
                </div>
            </div>
        





        <script>
            $(function() {
                $(".talent_filter_selectize").selectize({
                    plugins: ["restore_on_backspace", "remove_button"]
                });
            });
        </script>
        
            <input type="reset" class="btn mb-5 mr-3 reset-btn" value="Reset" data-submit="SearchButton_Talents_searchpage">
            <input type="submit" id="SearchButton_Talents_searchpage" class="btn mb-5" value="Search">
        </form>
    </div>
</div> -->

    <div class="listing_warp w-100" id="searchcontainer_Talents_searchpage">
        <input type="hidden" id="searchcontainer_Talents_searchpage-total_count" value="48" autocomplete="off">

        <table class="table table-bordered listing_table th_bg col_custom_width first_col_center">
            <thead>
                <tr>
                    <th scope="col">
                        <div class="d-flex align-items-center dropdown action_dropdown">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input crmcheckboxaction_head" id="searchcontainer_Talents_searchpage-checkbox-head" data-container="searchcontainer_Talents_searchpage">
                                <label class="custom-control-label" for="searchcontainer_Talents_searchpage-checkbox-head"></label>
                            </div>

                            <i class="fal fa-angle-down font_20 cursor_pointer" data-toggle="dropdown" aria-expanded="false"></i>
                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(24px, 22px, 0px);">
                                <a class="dropdown-item crmmultiactionbutton" data-container="searchcontainer_Talents_searchpage" data-action="MassCreate" data-key="AddNote" data-module="Talents" data-parent="" data-parentid="">Add Note</a><a class="dropdown-item crmmultiactionbutton" data-container="searchcontainer_Talents_searchpage" data-action="MassCreate" data-key="AddTask" data-module="Talents" data-parent="" data-parentid="">Add Task</a><a class="dropdown-item crmmultiactionbutton" data-container="searchcontainer_Talents_searchpage" data-action="Delete" data-key="Delete" data-module="Talents" data-parent="" data-parentid="">Delete</a><a class="dropdown-item crmmultiactionbutton" data-container="searchcontainer_Talents_searchpage" data-action="Email" data-key="Email" data-module="Talents" data-parent="" data-parentid="">Email</a><a class="dropdown-item crmmultiactionbutton" data-container="searchcontainer_Talents_searchpage" data-action="MassChange" data-key="MassChange" data-module="Talents" data-parent="" data-parentid="">Mass Change</a>
                            </div>
                        </div>

                    </th>
                    <th scope="col">Edit

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.hours_pending" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Hours Pending</a>

                    </th>

                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.hours_booked" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Hours Booked</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.hours_worked" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Hours Worked</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.hours_overtime" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Hours Overtime</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.name" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Name</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.city_id" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">City/State/Country</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.phone" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Phone</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.email_address" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Email</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.agency_rating" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Rating</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.last_active" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Last Active</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.talent_type" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Talent Type</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Users.gender" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Gender</a>

                    </th>
                    <th scope="col"><a class="sortresults" href="#" data-sort="Talents.date_created" data-sortdir="asc" data-parent="" data-parentid="" data-module="Talents" data-mode="searchpage">Date Created</a>
                        <span class="up_down"><i class="far fa-sort-down"></i></span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_B94028AC-C727-4023-AF21-6A95ABC7D000">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_B94028AC-C727-4023-AF21-6A95ABC7D000"></label>
                        </div>
                    </td>
                
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="D8F53282-D411-4D50-8E70-C318BD2ED24E" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->

                     <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=D8F53282-D411-4D50-8E70-C318BD2ED24E"><b>Chan Man </b></a></td>
                    <td>Atlanta, Georgia, United States of America</td>
                    <td><a href="tel:4554545235"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(455) 454-5235</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="test1@g.com" href="#">chan@mail.com</a></td>
                    <td>5.00</td>
                    <td>06/28/2021 06:29 PM</td>
                    <td>General Talent</td>
                    <td>Male</td>
                    <td>06/28/2021 05:38 PM</td>
                </tr>
                
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="B94028AC-C727-4023-AF21-6A95ABC7D000" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                   
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=B94028AC-C727-4023-AF21-6A95ABC7D000"><b>Moazzam Ali</b></a></td>
                    <td>Dallas, Texas, United States of America</td>
                    <td><a href="tel:+923144491119"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-pk-preferred"><span class="iti__flag iti__pk"></span>&nbsp;0314 4491119</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="mz@tempmail.com" href="#">mz@tempmail.com</a></td>
                    <td>4.00</td>
                    <td>07/01/2021 07:30 PM</td>
                    <td>General Talent</td>
                    <td>Male</td>
                    <td>06/29/2021 07:05 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_D8F53282-D411-4D50-8E70-C318BD2ED24E">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_D8F53282-D411-4D50-8E70-C318BD2ED24E"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="D8F53282-D411-4D50-8E70-C318BD2ED24E" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=D8F53282-D411-4D50-8E70-C318BD2ED24E"><b>Andre</b></a></td>
                    <td>Fort Lauderdale, Florida, United States of America</td>
                    <td><a href="tel:4554545235"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(455) 454-5235</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="test1@g.com" href="#">andre@gmail.com</a></td>
                    <td>1.00</td>
                    <td>05/18/2021 04:49 PM</td>
                    <td>General Talent</td>
                    <td>Female</td>
                    <td>06/28/2021 05:40 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=9B5177A4-94D1-4B7D-B4C5-468BFB67A0FD"><b>Test Account</b></a></td>
                    <td>New York, New York, United States of America</td>
                    <td><a href="tel:12345678912"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(234) 567-8912</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="testaccount3@yopmail.com" href="#">testaccount3@yopmail.com</a></td>
                    <td>0.00</td>
                    <td>06/28/2021 05:40 PM</td>
                    <td></td>
                    <td>Male</td>
                    <td>06/28/2021 03:49 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_4D90AEF6-8A9E-402C-BA55-FA23033D97C1">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_4D90AEF6-8A9E-402C-BA55-FA23033D97C1"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="4D90AEF6-8A9E-402C-BA55-FA23033D97C1" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=4D90AEF6-8A9E-402C-BA55-FA23033D97C1"><b>Apple Account</b></a></td>
                    <td>New York, New York, United States of America</td>
                    <td><a href="tel:12345678912"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(234) 567-8912</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="apple@apple.com" href="#">apple@apple.com</a></td>
                    <td>0.00</td>
                    <td>06/29/2021 03:26 AM</td>
                    <td></td>
                    <td>Male</td>
                    <td>06/22/2021 06:41 PM</td>
                </tr>
               
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_AD112698-BA7C-4574-AAC6-EFEFB3B16BEF">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_AD112698-BA7C-4574-AAC6-EFEFB3B16BEF"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="AD112698-BA7C-4574-AAC6-EFEFB3B16BEF" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                   
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=AD112698-BA7C-4574-AAC6-EFEFB3B16BEF"><b>User Name</b></a></td>
                    <td>New York, New York, United States of America</td>
                    <td><a href="tel:12345678912"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(234) 567-8912</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="iphone@yopmail.com" href="#">iphone@yopmail.com</a></td>
                    <td>0.00</td>
                    <td>06/29/2021 07:06 PM</td>
                    <td>General Talent</td>
                    <td>Female</td>
                    <td>04/15/2021 03:58 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_C342D637-6CD6-4DA5-9C83-8EB057829BA1">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_C342D637-6CD6-4DA5-9C83-8EB057829BA1"></label>
                        </div>
                    </td>
                 
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="C342D637-6CD6-4DA5-9C83-8EB057829BA1" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=C342D637-6CD6-4DA5-9C83-8EB057829BA1"><b>Harrold Roberts</b></a></td>
                    <td>San Diego, California, United States of America</td>
                    <td><a href="tel:6192000665"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(619) 200-0665</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="Macmuscles@gmail.com" href="#">Macmuscles@gmail.com</a></td>
                    <td>0.00</td>
                    <td></td>
                    <td></td>
                    <td>Male</td>
                    <td>04/07/2021 10:49 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_58BEAE46-C657-41D1-A680-106483A9E528">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_58BEAE46-C657-41D1-A680-106483A9E528"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="58BEAE46-C657-41D1-A680-106483A9E528" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=58BEAE46-C657-41D1-A680-106483A9E528"><b>max test</b></a></td>
                    <td>Los Vegas, Guanajuato, Mexico</td>
                    <td></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="ahmedtesting@yopmail.com" href="#">ahmedtesting@yopmail.com</a></td>
                    <td>0.00</td>
                    <td></td>
                    <td></td>
                    <td>Male</td>
                    <td>08/17/2020 01:27 PM</td>
                </tr>
                <tr>
                    <td>
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input crmcheckboxaction searchcontainer_Talents_searchpage-searchresult-checkbox" data-container="searchcontainer_Talents_searchpage-searchresult-checkbox" id="checkbox-Talents_searchpage_42A93556-3ADC-4694-80E1-95B83A0F9B67">
                            <label class="custom-control-label" for="checkbox-Talents_searchpage_42A93556-3ADC-4694-80E1-95B83A0F9B67"></label>
                        </div>
                    </td>
                    
                    <td><a name="quickedit" data-module="Talents" class="fas fa-pen-square mr-2 crmcreatebutton" data-createtype="quickedit" data-toggle="modal" data-target="#createrecord" data-parent="" data-parentid="" data-record="42A93556-3ADC-4694-80E1-95B83A0F9B67" data-searchid="222197_1624989361.5778" data-usermode="tenant"></a></td>
                    
                    <td>10</td>  <!-- Pending commit -->
                    <td>10</td>   <!-- Booked -->
                    <td>10</td>  <!-- Worked -->
                    <td>10</td> <!-- Overtime -->
                    
                    <td><a style="color: inherit;" href="https://demo.v2.senegalsoftware.com/Talents/detail?id=42A93556-3ADC-4694-80E1-95B83A0F9B67"><b>Sam Owen</b></a></td>
                    <td>Glendale, Arizona, United States of America</td>
                    <td><a href="tel:4805709226"><span class="iti__selected-flag" aria-activedescendant="iti-6__item-us-preferred"><span class="iti__flag iti__us"></span>&nbsp;(480) 570-9226</span></a></td>
                    <td><a class="crmsendemail" data-module="Talents" data-record="truescorpio32@gmail.com" href="#">truescorpio32@gmail.com</a></td>
                    <td>0.00</td>
                    <td></td>
                    <td></td>
                    <td>Female</td>
                    <td>08/16/2020 05:40 AM</td>
                </tr>
            
            </tbody>
        </table>


    </div>
    </div>


</body>

</html>