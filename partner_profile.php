<?php
include('./function.php');
$id = $_GET['id'];
$profile = getPartnerDetail($id);
$friend = getFriends($id);
$follow = userFollow($id);
$isFriend = requestAccepted($id);
$status = showStatus($id);
$status_count = count($status);
$cid = null;
if (isset($_SESSION['cid'])) {
    $cid = $_SESSION['cid'];
    unset($_SESSION['cid']);
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('./partial/wall_head.php');  ?>
</head>

<body>
    <?php include('./partial/header.php'); ?>
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <div>
                    <div class="content social-timeline">
                        <div class="">

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="social-wallpaper">
                                        <?php if (!empty($profile['cover_image'])) {
                                            echo $image_dir_url . $profile['cover_image'];
                                        } else { ?>
                                            <img src="./image/Bg1.jpg" width="100%" height="100%" alt="No Cover Image">
                                        <?php  } ?>
                                        <div class="profile-hvr">
                                            <i class="icofont icofont-ui-edit p-r-10"></i>
                                            <i class="icofont icofont-ui-delete"></i>
                                        </div>
                                    </div>
                                    <?php $is_friend = requestAccepted($profile['id']); ?>
                                    <div class="timeline-btn">
                                        <?php if ($is_friend == true) { ?>
                                            <a type="button" class="btn" style="color: beige;"><img src="./image/correct.png" width="20" height="20"> Request Accepted</img></a>
                                        <?php } else { ?>
                                            <a class="btn btn-primary waves-effect waves-light m-r-10">Follow</a>
                                        <?php  } ?>
                                        <a href="#" class="btn btn-primary waves-effect waves-light">Send Message</a>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-3 col-lg-4 col-md-4 col-xs-12">
                                    <div class="social-timeline-left">
                                        <div class="card">
                                            <div class="social-profile">
                                                <img class="img-fluid width-100" src="<?php echo $image_dir_url . $profile['image'];  ?>" alt="">
                                                <div class="profile-hvr m-t-15">
                                                    <i class="icofont icofont-ui-edit p-r-10"></i>
                                                    <i class="icofont icofont-ui-delete"></i>
                                                </div>
                                            </div>
                                            <div class="card-block social-follower">
                                                <h4><?php echo $profile['first_name'] . ' ' . $profile['last_name']; ?></h4>
                                                <h5><?php echo $profile['description']; ?></h5>
                                                <div class="row follower-counter">
                                                    <div class="col-4">
                                                        <button class="btn btn-primary btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="485">
                                                            <i class="fa fa-user"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button class="btn btn-danger btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="2k">
                                                            <i class="fa fa-thumbs-o-up"></i>
                                                        </button>
                                                    </div>
                                                    <div class="col-4">
                                                        <button class="btn btn-success btn-icon" data-toggle="tooltip" data-placement="top" title="" data-original-title="90">
                                                            <i class="fa fa-eye"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <?php if ($is_friend == true) { ?>
                                                    <a type="button" class="btn" style="color: black;"><img src="./image/correct.png" width="20" height="20"> Friends</img></a>
                                                <?php } else { ?>
                                                    <a class="btn btn-primary waves-effect waves-light m-r-10">Add as Friend</a>
                                                <?php  } ?>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text">Who to follow</h5>
                                            </div>
                                            <div class="card-block user-box">
                                                <div class="media m-b-10">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="Generic placeholder image" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                        <div class="live-status bg-danger"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="chat-header">Josephin Doe</div>
                                                        <div class="text-muted social-designation">Softwear Engineer</div>
                                                    </div>
                                                </div>
                                                <div class="media m-b-10">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="Generic placeholder image" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                        <div class="live-status bg-success"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="chat-header">Josephin Doe</div>
                                                        <div class="text-muted social-designation">Softwear Engineer</div>
                                                    </div>
                                                </div>
                                                <div class="media m-b-10">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                        <div class="live-status bg-danger"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="chat-header">Josephin Doe</div>
                                                        <div class="text-muted social-designation">Softwear Engineer</div>
                                                    </div>
                                                </div>
                                                <div class="media m-b-10">
                                                    <a class="media-left" href="#!">
                                                        <img class="media-object img-radius" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="Generic placeholder image" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                        <div class="live-status bg-success"></div>
                                                    </a>
                                                    <div class="media-body">
                                                        <div class="chat-header">Josephin Doe</div>
                                                        <div class="text-muted social-designation">Softwear Engineer</div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="card">
                                            <div class="card-header">
                                                <h5 class="card-header-text d-inline-block">Friends</h5>

                                                <span class="label label-primary f-right"> </span>
                                            </div>
                                            <div class="card-block friend-box">
                                                <?php foreach ($friend as $key => $is_friend) { ?>
                                                    <img class="media-object img-radius" src="<?php echo $image_dir_url . $is_friend['image'];  ?>" alt="" data-toggle="tooltip" data-placement="top" title="" data-original-title="user image">
                                                <?php  } ?>
                                            </div>
                                        </div>

                                    </div>

                                </div>
                                <div class="col-xl-9 col-lg-8 col-md-8 col-xs-12 ">

                                    <div class="card social-tabs">
                                        <ul class="nav nav-tabs md-tabs tab-timeline" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="tab" href="#timeline" role="tab">Timeline</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#about" role="tab">About</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#photos" role="tab">Photos</a>
                                                <div class="slide"></div>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="tab" href="#friends" role="tab">Friends</a>
                                                <div class="slide"></div>
                                            </li>
                                        </ul>
                                    </div>

                                    <div class="tab-content">

                                        <div class="tab-pane active" id="timeline">
                                            <div class="row">
                                                <div class="col-md-12 timeline-dot">
                                                    <?php foreach ($status as $key => $post) { ?>
                                                        <div class="social-timelines p-relative">
                                                            <div class="row timeline-right p-t-35">
                                                                <div class="col-2 col-sm-2 col-xl-1">
                                                                    <div class="social-timelines-left">
                                                                        <img class="img-radius timeline-icon" src="<?php echo $image_dir_url . $profile['image'];   ?>" alt="">
                                                                    </div>
                                                                </div>
                                                                <div class="col-10 col-sm-10 col-xl-11 p-l-5 p-b-35">
                                                                    <div class="card">
                                                                        <div class="card-block post-timelines">
                                                                            <div class="chat-header f-w-600"><?php echo $profile['first_name'] . ' ' . $profile['last_name']; ?> posted on timeline</div>
                                                                            <div class="social-time text-muted"><?php echo date('d-m-y', strtotime($post['created_date'])) . ' ' . "at" . ' ' . date('h:i', strtotime($post['created_date']));  ?></div>
                                                                        </div>
                                                                        <img src="<?php echo $image_dir_url . $post['image'];   ?>" class="img-fluid width-100" alt="">
                                                                        <div class="card-block">
                                                                            <div class="timeline-details">
                                                                                <div class="chat-header"><?php echo $profile['first_name'] . ' ' . $profile['last_name']; ?> posted on timeline</div>
                                                                                <p class="text-muted"> <?php echo $post['description'] ?> </p>
                                                                            </div>
                                                                        </div>
                                                                        <div class="card-block b-b-theme b-t-theme social-msg">
                                                                            <a href="#"> <i class="icofont icofont-heart-alt text-muted"></i><span class="b-r-muted">Like </span> </a>
                                                                            <a> <i class="icofont icofont-comment "></i><span class="btn btn-primary b-r-muted show_comments" data-id="<?= $post['id']; ?>">Comments</span></a>
                                                                            <a href="#"> <i class="icofont icofont-share text-muted"></i> <span>Share </span></a>
                                                                        </div>
                                                                        <div class="card-block user-box">
                                                                            <?php $status_id = $post['id']; ?>
                                                                            <?php $limit = 1; ?>
                                                                            <?php $comment = showComments($status_id, $limit); ?>
                                                                            <?php $count = count($comment); ?>
                                                                            <!-- <div class="p-b-30"> <span class="f-14"><a href="#"></a></span><span class="f-right"></span></div> -->
                                                                            <?php if ($count != 0) { ?>
                                                                                <?php if ($cid == $post['id']) { ?>
                                                                                    <div class="cshow">
                                                                                        <?php echo $cid ?>
                                                                                    </div>
                                                                                <?php } ?>
                                                                            <?php } else { ?>
                                                                                <p style="text-align: center;">No Comments
                                                                                    Available On this Post</p>
                                                                            <?php } ?>

                                                                            <div class="media">
                                                                                <?php foreach ($comment as $key => $comments) { ?>
                                                                                    <a class="media-left" href="#">
                                                                                        <img class="media-object img-radius m-r-20" src="<?php echo $image_dir_url . $comments['image'] ?>" alt="Generic placeholder image">
                                                                                    </a>
                                                                                <?php } ?>
                                                                                <div class="media-body">
                                                                                    <form action="./server/post_comment.php?id=<?php echo $profile['id']; ?>" method="POST">
                                                                                        <input type="hidden" class="status_id" name="status_id" value="<?php echo $post['id'] ?>">
                                                                                        <div>
                                                                                            <textarea rows="5" cols="5" class="form-control" name="comment" id="comment" placeholder="Type Your Comment..."></textarea>
                                                                                            <button type="submit" class="btn btn-primary">Submit</button>
                                                                                        </div>
                                                                                    </form>
                                                                                </div>
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    <?php } ?>

                                                </div>

                                                <!-- <div class="tab-pane" id="about">
                                                 <div class="row">
                                                     <div class="col-sm-12">
                                                         <div class="card">
                                                             <div class="card-header">
                                                                 <h5 class="card-header-text">Basic Information</h5>
                                                                 <button id="edit-btn" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                                                     <i class="icofont icofont-edit"></i>
                                                                 </button>
                                                             </div>
                                                             <div class="card-block">
                                                                 <div id="view-info" class="row">
                                                                     <div class="col-lg-6 col-md-12">
                                                                         <form>
                                                                             <table class="table table-responsive m-b-0">
                                                                                 <tbody>
                                                                                     <tr>
                                                                                         <th class="social-label b-none p-t-0">Full Name
                                                                                         </th>
                                                                                         <td class="social-user-name b-none p-t-0 text-muted">Josephine Villa</td>
                                                                                     </tr>
                                                                                     <tr>
                                                                                         <th class="social-label b-none">Gender</th>
                                                                                         <td class="social-user-name b-none text-muted">Female</td>
                                                                                     </tr>
                                                                                     <tr>
                                                                                         <th class="social-label b-none">Birth Date</th>
                                                                                         <td class="social-user-name b-none text-muted">October 25th, 1990</td>
                                                                                     </tr>
                                                                                     <tr>
                                                                                         <th class="social-label b-none">Martail Status</th>
                                                                                         <td class="social-user-name b-none text-muted">Single</td>
                                                                                     </tr>
                                                                                     <tr>
                                                                                         <th class="social-label b-none p-b-0">Location</th>
                                                                                         <td class="social-user-name b-none p-b-0 text-muted">New York, USA</td>
                                                                                     </tr>
                                                                                 </tbody>
                                                                             </table>
                                                                         </form>
                                                                     </div>
                                                                 </div>
                                                                 <div id="edit-info" class="row" style="display: none;">
                                                                     <div class="col-lg-12 col-md-12">
                                                                         <form>
                                                                             <div class="input-group">
                                                                                 <input type="text" class="form-control" placeholder="Full Name">
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <div class="form-radio">
                                                                                     <div class="form-radio">
                                                                                         <label class="md-check p-0">Gender</label>
                                                                                         <div class="radio radio-inline">
                                                                                             <label>
                                                                                                 <input type="radio" name="radio" checked="checked">
                                                                                                 <i class="helper"></i>Male
                                                                                             </label>
                                                                                         </div>
                                                                                         <div class="radio radio-inline">
                                                                                             <label>
                                                                                                 <input type="radio" name="radio">
                                                                                                 <i class="helper"></i>Female
                                                                                             </label>
                                                                                         </div>
                                                                                     </div>
                                                                                 </div>
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <input id="dropper-default" class="form-control" type="text" placeholder="Birth Date">
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <select id="hello-single" class="form-control">
                                                                                     <option value="">---- Marital Status ----</option>
                                                                                     <option value="married">Married</option>
                                                                                     <option value="unmarried">Unmarried</option>
                                                                                 </select>
                                                                             </div>
                                                                             <div class="md-group-add-on">
                                                                                 <textarea rows="5" cols="5" class="form-control" placeholder="Address..."></textarea>
                                                                             </div>
                                                                             <div class="text-center m-t-20">
                                                                                 <a href="javascript:;" id="edit-save" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
                                                                                 <a href="javascript:;" id="edit-cancel" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                                             </div>
                                                                         </form>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-12">
                                                         <div class="card">
                                                             <div class="card-header">
                                                                 <h5 class="card-header-text">Contact Information</h5>
                                                                 <button id="edit-Contact" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                                                     <i class="icofont icofont-edit"></i>
                                                                 </button>
                                                             </div>
                                                             <div class="card-block">
                                                                 <div id="contact-info" class="row">
                                                                     <div class="col-lg-6 col-md-12">
                                                                         <table class="table table-responsive m-b-0">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <th class="social-label b-none p-t-0">Mobile Number</th>
                                                                                     <td class="social-user-name b-none p-t-0 text-muted">eg. (0123) - 4567891</td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th class="social-label b-none">Email Address</th>
                                                                                     <td class="social-user-name b-none text-muted">test@gmail.com</td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th class="social-label b-none">Twitter</th>
                                                                                     <td class="social-user-name b-none text-muted">@phonixcoded</td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th class="social-label b-none p-b-0">Skype</th>
                                                                                     <td class="social-user-name b-none p-b-0 text-muted">@phonixcoded demo</td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </div>
                                                                 </div>
                                                                 <div id="edit-contact-info" class="row" style="display: none;">
                                                                     <div class="col-lg-12 col-md-12">
                                                                         <form>
                                                                             <div class="input-group">
                                                                                 <input type="text" class="form-control" placeholder="Mobile number">
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <input type="text" class="form-control" placeholder="Email address">
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <input type="text" class="form-control" placeholder="Twitter id">
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <input type="text" class="form-control" placeholder="Skype id">
                                                                             </div>
                                                                             <div class="text-center m-t-20">
                                                                                 <a href="javascript:;" id="contact-save" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
                                                                                 <a href="javascript:;" id="contact-cancel" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                                             </div>
                                                                         </form>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                     <div class="col-sm-12">
                                                         <div class="card">
                                                             <div class="card-header">
                                                                 <h5 class="card-header-text">Work</h5>
                                                                 <button id="edit-work" type="button" class="btn btn-primary waves-effect waves-light f-right">
                                                                     <i class="icofont icofont-edit"></i>
                                                                 </button>
                                                             </div>
                                                             <div class="card-block">
                                                                 <div id="work-info" class="row">
                                                                     <div class="col-lg-6 col-md-12">
                                                                         <table class="table table-responsive m-b-0">
                                                                             <tbody>
                                                                                 <tr>
                                                                                     <th class="social-label b-none p-t-0">Occupation &nbsp; &nbsp; &nbsp;
                                                                                     </th>
                                                                                     <td class="social-user-name b-none p-t-0 text-muted">Developer</td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th class="social-label b-none">Skills</th>
                                                                                     <td class="social-user-name b-none text-muted">C#, Javascript, Anguler</td>
                                                                                 </tr>
                                                                                 <tr>
                                                                                     <th class="social-label b-none">Jobs</th>
                                                                                     <td class="social-user-name b-none p-b-0 text-muted">#</td>
                                                                                 </tr>
                                                                             </tbody>
                                                                         </table>
                                                                     </div>
                                                                 </div>
                                                                 <div id="edit-contact-work" class="row" style="display: none;">
                                                                     <div class="col-lg-12 col-md-12">
                                                                         <form>
                                                                             <div class="input-group">
                                                                                 <select id="occupation" class="form-control">
                                                                                     <option value=""> Select occupation </option>
                                                                                     <option value="married">Developer</option>
                                                                                     <option value="unmarried">Web Design</option>
                                                                                 </select>
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <select id="skill" class="form-control">
                                                                                     <option value=""> Select Skills </option>
                                                                                     <option value="married">C# &amp; .net</option>
                                                                                     <option value="unmarried">Angular</option>
                                                                                 </select>
                                                                             </div>
                                                                             <div class="input-group">
                                                                                 <select id="job" class="form-control">
                                                                                     <option value=""> Select Job </option>
                                                                                     <option value="married">#</option>
                                                                                     <option value="unmarried">Other</option>
                                                                                 </select>
                                                                             </div>
                                                                             <div class="text-center m-t-20">
                                                                                 <a href="javascript:;" id="work-save" class="btn btn-primary waves-effect waves-light m-r-20">Save</a>
                                                                                 <a href="javascript:;" id="work-cancel" class="btn btn-default waves-effect waves-light">Cancel</a>
                                                                             </div>
                                                                         </form>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div>
                                             </div> -->

                                                <!-- <div class="tab-pane" id="photos">
                                                     <div class="card">

                                                         <div class="card-block">
                                                             <div class="demo-gallery">
                                                                 <ul id="profile-lightgallery" class="row">
                                                                     <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                                                                         <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                                                             <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-fluid" alt="">
                                                                         </a>
                                                                     </li>
                                                                     <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                                                                         <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                                                             <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-fluid" alt="">
                                                                         </a>
                                                                     </li>
                                                                     <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                                                                         <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                                                             <img src="https://bootdey.com/img/Content/avatar/avatar3.png" class="img-fluid" alt="">
                                                                         </a>
                                                                     </li>
                                                                     <li class="col-md-4 col-lg-2 col-sm-6 col-xs-12">
                                                                         <a href="#" data-toggle="lightbox" data-title="A random title" data-footer="A custom footer text">
                                                                             <img src="https://bootdey.com/img/Content/avatar/avatar4.png" class="img-fluid" alt="">
                                                                         </a>
                                                                     </li>
                                                                 </ul>
                                                             </div>
                                                         </div>

                                                     </div>
                                                 </div>

                                                 <div class="tab-pane" id="friends">
                                                     <div class="row">
                                                         <div class="col-lg-12 col-xl-6">
                                                             <div class="card">
                                                                 <div class="card-block post-timelines">
                                                                     <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                     <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                         <a class="dropdown-item" href="#">Remove tag</a>
                                                                         <a class="dropdown-item" href="#">Report Photo</a>
                                                                         <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                         <a class="dropdown-item" href="#">Blog User</a>
                                                                     </div>
                                                                     <div class="media bg-white d-flex">
                                                                         <div class="media-left media-middle">
                                                                             <a href="#">
                                                                                 <img class="media-object" width="120" src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                                                                             </a>
                                                                         </div>
                                                                         <div class="media-body friend-elipsis">
                                                                             <div class="f-15 f-bold m-b-5">Josephin Doe</div>
                                                                             <div class="text-muted social-designation">Software Engineer</div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-12 col-xl-6">
                                                             <div class="card">
                                                                 <div class="card-block post-timelines">
                                                                     <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                     <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                         <a class="dropdown-item" href="#">Remove tag</a>
                                                                         <a class="dropdown-item" href="#">Report Photo</a>
                                                                         <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                         <a class="dropdown-item" href="#">Blog User</a>
                                                                     </div>
                                                                     <div class="media bg-white d-flex">
                                                                         <div class="media-left media-middle">
                                                                             <a href="#">
                                                                                 <img class="media-object" width="120" src="https://bootdey.com/img/Content/avatar/avatar2.png" alt="">
                                                                             </a>
                                                                         </div>
                                                                         <div class="media-body friend-elipsis">
                                                                             <div class="f-15 f-bold m-b-5">Josephin Doe</div>
                                                                             <div class="text-muted social-designation">Software Engineer</div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-12 col-xl-6">
                                                             <div class="card">
                                                                 <div class="card-block post-timelines">
                                                                     <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                     <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                         <a class="dropdown-item" href="#">Remove tag</a>
                                                                         <a class="dropdown-item" href="#">Report Photo</a>
                                                                         <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                         <a class="dropdown-item" href="#">Blog User</a>
                                                                     </div>
                                                                     <div class="media bg-white d-flex">
                                                                         <div class="media-left media-middle">
                                                                             <a href="#">
                                                                                 <img class="media-object" width="120" src="https://bootdey.com/img/Content/avatar/avatar3.png" alt="">
                                                                             </a>
                                                                         </div>
                                                                         <div class="media-body friend-elipsis">
                                                                             <div class="f-15 f-bold m-b-5">Josephin Doe</div>
                                                                             <div class="text-muted social-designation">Software Engineer</div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                         <div class="col-lg-12 col-xl-6">
                                                             <div class="card">
                                                                 <div class="card-block post-timelines">
                                                                     <span class="dropdown-toggle addon-btn text-muted f-right service-btn" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true" role="tooltip"></span>
                                                                     <div class="dropdown-menu dropdown-menu-right b-none services-list">
                                                                         <a class="dropdown-item" href="#">Remove tag</a>
                                                                         <a class="dropdown-item" href="#">Report Photo</a>
                                                                         <a class="dropdown-item" href="#">Hide From Timeline</a>
                                                                         <a class="dropdown-item" href="#">Blog User</a>
                                                                     </div>
                                                                     <div class="media bg-white d-flex">
                                                                         <div class="media-left media-middle">
                                                                             <a href="#">
                                                                                 <img class="media-object" width="120" src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="">
                                                                             </a>
                                                                         </div>
                                                                         <div class="media-body friend-elipsis">
                                                                             <div class="f-15 f-bold m-b-5">Josephin Doe</div>
                                                                             <div class="text-muted social-designation">Software Engineer</div>
                                                                         </div>
                                                                     </div>
                                                                 </div>
                                                             </div>
                                                         </div>
                                                     </div>
                                                 </div> -->
</body>

</html>