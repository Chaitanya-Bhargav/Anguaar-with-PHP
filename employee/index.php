<!DOCTYPE html>
<html>
<head>
    <title>Employee Details</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="screen">
    <link href="css/form_style.css" rel="stylesheet" type="text/css" media="screen">
</head>
</head>
<body ng-app="myapp">
    <div class="container" ng-controller="mycntrl">
        <form class="form-horizontal" role="form" name="register" ng-submit="insertData()" method="POST">
            <h2>JD Interview Application Form</h2>
            <div class="form-group">
                <label class="col-sm-4 control-label">Employee Name
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="text" name="name" id="name" placeholder="Enter name" class="form-control"
                           autofocus ng-model="ename" ng-required="true"/>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.name.$error.required && register.name.$dirty" class="control-label has-error">
                        *Employee name is required
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Email
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="email" ng-model="email" ng-required="true" id="email"
                           name="email" placeholder="Enter email" class="form-control">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.email.$error.required && register.email.$dirty" class="control-label has-error">
                        *Email is required
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Mobile
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="number" ng-model="phone" ng-pattern="/^\d{10}$/" ng-required="true" id="mobile"
                      ng-maxlength="12" ng-minlength="10" name="mobile" placeholder="91******" class="form-control">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.mobile.$error.required && register.mobile.$dirty" class="control-label has-error">
                        * mobile number is required
                    </span>
                    <span ng-show="register.mobile.$error.minlength && register.mobile.$dirty" class="control-label has-error">
                        *Mobile number has minimum 10 numbers
                    </span>
                    <span ng-show="register.mobile.$error.maxlength && register.mobile.$dirty" class="control-label has-error">
                        *Mobile number has maximum 12 numbers
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Gender
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <select name="gender" class="form-control" ng-model="gender" ng-required="true" id="gender">
                        <option value="">-Select-</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.gender.$error.required && register.gender.$dirty" class="control-label has-error">
                        *Please select gender
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Total Experience
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="number" name="experience" class="form-control"
                           id="experience" ng-model="experience" ng-required="true">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.experience.$error.required && register.experience.$dirty" class="control-label has-error">
                        *Enter your experience
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Previous Company
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="text" id="company" name="company" class="form-control" ng-model="company" ng-required="true">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.company.$error.required && register.company.$dirty" class="control-label has-error">
                        *Please enter your prevoius company name
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Source of interview
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <select name="interview_type" id="interview_type" class="form-control" ng-required="true" ng-model="interview_type">
                        <option value="">-Select-</option>
                        <option value="Employee Referral">Employee Referral</option>
                        <option value="Walk-in">Walk-in</option>
                        <option value="Consultancy">Consultancy</option>
                        <option value="Social Media">Social Media</option>
                        <option value="Others">Others</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.interview_type.$error.required && register.interview_type.$dirty" class="control-label has-error">
                        *Please your interview type
                    </span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-sm-4 control-label">Position Applied
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <select name="position" id="position" class="form-control" ng-model="position" ng-required="true">
                        <option value="">-Select-</option>
                        <option value="Developer">Developer</option>
                        <option value="Programmer">Programmer</option>
                        <option value="Team Lead">Team Lead</option>
                        <option value="Manager">Manager</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.position.$error.required && register.position.$dirty" class="control-label has-error">
                        *Please select applied position
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="control-label col-sm-4">Interview Round
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <select name="rounds" id="rounds" class="form-control" ng-required="true" ng-model="round">
                        <option value="">-Select-</option>
                        <option value="1st round">1st round</option>
                        <option value="2nd round">2nd round</option>
                        <option value="3rd round">3rd round</option>
                    </select>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.rounds.$error.required && register.rounds.$dirty" class="control-label has-error">
                        *Please select applied position
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Date Of Interview
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="date" name="date" id="date" class="form-control" ng-model="date" ng-required="true">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.date.$error.required && register.date.$dirty" class="control-label has-error">
                        *Please select date
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Interview Time
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <input type="time" name="time11" id="time" class="form-control" ng-required="true" ng-model="time">
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.time11.$error.required && register.time11.$dirty" class="control-label has-error">
                        *Please enter time
                    </span>
                </div>
            </div>
            <div class="form-group">
                <label class="col-sm-4 control-label">Comments
                    <span class="text-danger">*</span>
                </label>
                <div class="col-sm-4">
                    <textarea name="comments" id="comments" ng-minlength="20" ng-maxlength="100" class="form-control rounded-0" ng-required="true" ng-model="comments"></textarea>
                </div>
                <div class="col-sm-4">
                    <span ng-show="register.comments.$error.required && register.comments.$dirty" class="control-label has-error">
                        *Please write your comments
                    </span>
                    <span ng-show="register.comments.$error.maxlength && register.comments.$dirty" class="control-label has-error">
                        *Write atleast 20 characters
                    </span>
                    <span ng-show="register.comments.$error.minlength && register.comments.$dirty" class="control-label has-error">
                        *Write maximum  of 20 characters
                    </span>
                </div>
                <span id="msg"></span>
            </div>
            <div class="form-group">
                <div class="col-sm-8 col-sm-offset-4">
                    <button name="submit_btn"  type="submit" ng-disabled="register.$invalid" class="btn btn-primary ">Register</button>
                </div>
            </div>
        </form>
    </div>
</body>
<script src="angular.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="jquery-3.3.1.js"></script>
<script type="text/javascript" src="js/registration_controller.js"></script>
</html>
