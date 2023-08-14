<?php

return [
    'userManagement' => [
        'title'          => 'User management',
        'title_singular' => 'User management',
    ],
    'permission'     => [
        'title'          => 'Permissions',
        'title_singular' => 'Permission',
        'fields'         => [
            'id'                => 'ID',
            'id_helper'         => '',
            'title'             => 'Title',
            'title_helper'      => '',
            'created_at'        => 'Created at',
            'created_at_helper' => '',
            'updated_at'        => 'Updated at',
            'updated_at_helper' => '',
            'deleted_at'        => 'Deleted at',
            'deleted_at_helper' => '',
        ],
    ],
    'role'           => [
        'title'          => 'Roles',
        'title_singular' => 'Role',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'title'              => 'Title',
            'title_helper'       => '',
            'permissions'        => 'Permissions',
            'permissions_helper' => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
        ],
    ],
    'user'           => [
        'title'          => 'Users',
        'title_singular' => 'User',
        'fields'         => [
            'id'                       => 'ID',
            'id_helper'                => '',
            'name'                     => 'Name',
            'name_helper'              => '',
            'email'                    => 'Email',
            'email_helper'             => '',
            'email_verified_at'        => 'Email verified at',
            'email_verified_at_helper' => '',
            'password'                 => 'Password',
            'password_helper'          => '',
            'roles'                    => 'Roles',
            'roles_helper'             => '',
            'remember_token'           => 'Remember Token',
            'remember_token_helper'    => '',
            'created_at'               => 'Created at',
            'created_at_helper'        => '',
            'updated_at'               => 'Updated at',
            'updated_at_helper'        => '',
            'deleted_at'               => 'Deleted at',
            'deleted_at_helper'        => '',
            'photo'                    => 'Photo',
            'photo_helper'             => '',
        ],
    ],
    'doctor'         => [
        'title'          => 'Doctors',
        'title_singular' => 'Doctor',
        'fields'         => [
            'id'                     => 'ID',
            'id_helper'              => '',
            'first_name'             => 'First Name',
            'first_name_helper'      => '',
            'last_name'              => 'Last Name',
            'last_name_helper'       => '',
            'username'               => 'Username',
            'username_helper'        => '',
            'email'                  => 'Email',
            'email_helper'           => '',
            'date_of_birth'          => 'Date Of Birth',
            'date_of_birth_helper'   => '',
            'gender'                 => 'Gender',
            'gender_helper'          => '',
            'address'                => 'Address',
            'address_helper'         => '',
            'country'                => 'Country',
            'country_helper'         => '',
            'city'                   => 'City',
            'city_helper'            => '',
            'state'                  => 'State',
            'state_helper'           => '',
            'phone'                  => 'Phone',
            'phone_helper'           => '',
            'photo'                  => 'Photo',
            'photo_helper'           => '',
            'qualification'          => 'Qualification',
            'qualification_helper'   => '',
            'department'             => 'Department',
            'department_helper'      => '',
            'experience'             => 'Experience',
            'experience_helper'      => '',
            'short_biography'        => 'Short Biography',
            'short_biography_helper' => '',
            'days'                   => 'Days',
            'days_helper'            => '',
            'hospital_name'          => 'Hospital Name',
            'hospital_name_helper'   => '',
            'hospital_timing'        => 'Hospital Timing',
            'hospital_timing_helper' => '',
            'is_registered'          => 'Is Registered',
            'is_registered_helper'   => '',
            'created_at'             => 'Created at',
            'created_at_helper'      => '',
            'updated_at'             => 'Updated at',
            'updated_at_helper'      => '',
            'deleted_at'             => 'Deleted at',
            'deleted_at_helper'      => '',
            'user'                   => 'User',
            'user_helper'            => '',
        ],
    ],
    'patient'        => [
        'title'          => 'Patients',
        'title_singular' => 'Patient',
        'fields'         => [
            'id'                 => 'ID',
            'id_helper'          => '',
            'name'               => 'Name',
            'name_helper'        => '',
            'father_name'        => 'Father Name',
            'father_name_helper' => '',
            'age'                => 'Age',
            'age_helper'         => '',
            'email'              => 'Email',
            'email_helper'       => '',
            'phone'              => 'Phone',
            'phone_helper'       => '',
            'gender'             => 'Gender',
            'gender_helper'      => '',
            'disease'            => 'Disease',
            'disease_helper'     => '',
            'city'               => 'City',
            'city_helper'        => '',
            'country'            => 'Country',
            'country_helper'     => '',
            'address'            => 'Address',
            'address_helper'     => '',
            'created_at'         => 'Created at',
            'created_at_helper'  => '',
            'updated_at'         => 'Updated at',
            'updated_at_helper'  => '',
            'deleted_at'         => 'Deleted at',
            'deleted_at_helper'  => '',
            'user'               => 'User',
            'user_helper'        => '',
        ],
    ],
    'appointment'    => [
        'title'          => 'Appointments',
        'title_singular' => 'Appointment',
        'fields'         => [
            'id'                      => 'ID',
            'id_helper'               => '',
            'patient'                 => 'Patient',
            'patient_helper'          => '',
            'doctor'                  => 'Doctor',
            'doctor_helper'           => '',
            'created_at'              => 'Created at',
            'created_at_helper'       => '',
            'updated_at'              => 'Updated at',
            'updated_at_helper'       => '',
            'deleted_at'              => 'Deleted at',
            'deleted_at_helper'       => '',
            'start_date'              => 'Start Date',
            'start_date_helper'       => '',
            'start_time'              => 'Start Time',
            'start_time_helper'       => '',
            'status'                  => 'Status',
            'status_helper'           => '',
            'appointment_desc'        => 'Appointment Desc',
            'appointment_desc_helper' => '',
            'type'                    => 'Type',
            'type_helper'             => '',
        ],
    ],
    'payment'        => [
        'title'          => 'Payments',
        'title_singular' => 'Payment',
        'fields'         => [
            'id'                    => 'ID',
            'id_helper'             => '',
            'doctor'                => 'Doctor',
            'doctor_helper'         => '',
            'patient'               => 'Patient',
            'patient_helper'        => '',
            'appointment'           => 'Appointment',
            'appointment_helper'    => '',
            'type'                  => 'Type',
            'type_helper'           => '',
            'payment_amount'        => 'Payment Amount',
            'payment_amount_helper' => '',
            'created_at'            => 'Created at',
            'created_at_helper'     => '',
            'updated_at'            => 'Updated at',
            'updated_at_helper'     => '',
            'deleted_at'            => 'Deleted at',
            'deleted_at_helper'     => '',
        ],
    ],
];