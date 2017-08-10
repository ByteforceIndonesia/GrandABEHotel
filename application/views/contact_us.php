<?php
/**
 * Created by PhpStorm.
 * User: JohnNate
 * Date: 8/10/17
 * Time: 12:11 PM
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<div class="container">
    <div class="contactus">
        <div class="row">
            <div class="col-lg-12">
                <h1>Contact Us</h1>
            </div>
        </div>

        <?php if(validation_errors() || $this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo validation_errors() ?>
                <?php echo $this->session->flashdata('error') ?>
            </div>
        <?php endif; ?>

        <?php if($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <?php echo $this->session->flashdata('success') ?>
            </div>
        <?php endif; ?>

        <?php echo form_open('email/contact_mail', array('class' => 'contact_form')); ?>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="Name">Name</label>
                    <input type="text" name="name" id="name" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="phone">Phone</label>
                <input type="number" name="phone" id="phone" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="address">Address</label>
                <textarea name="address" id="address"  rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <label for="message">Message</label>
                <textarea name="message" id="message" cols="30" rows="10" class="form-control"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <input type="reset" value="Reset" class="form-btn reset-btn">
            </div>
            <div class="col-md-6">
                <input type="submit" value="Submit" class="form-btn submit-btn">
            </div>
        </div>
        <?php echo form_close() ?>
    </div>
</div>
