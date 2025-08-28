<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Player extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        // Personal Information
        'user_id',
        'media_id',
        'first_name',
        'last_name',
        'birthdate',
        'gender',
        'nationality',
        
        // Sports Information
        'position',
        'preferred_foot',
        'shirt_number',
        'joined_at',
        
        // Physical Characteristics
        'height',
        'weight',
        'blood_type',
        
        // Performance Statistics
        'goals',
        'assists',
        'matches_played',
        'is_injured',
        
        // Academic/Administrative Information
        'school_name',
        'address',
        'phone',
        'email',
        
        // Medical Information
        'medical_notes',
        'emergency_contact_name',
        'emergency_contact_phone',
        'medical_conditions',
        'notes'
    ];
    
    protected $casts = [
        'birthdate' => 'date',
        'joined_at' => 'date',
        'height' => 'integer',
        'weight' => 'decimal:2',
        'goals' => 'integer',
        'assists' => 'integer',
        'matches_played' => 'integer',
        'is_injured' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
    
    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = ['full_name', 'age', 'position_name', 'preferred_foot_name', 'gender_name'];
    
    /**
     * The relationships that should always be loaded.
     *
     * @var array
     */
    protected $with = ['media'];
    
    /**
     * Get the user that owns the player profile.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    /**
     * Get the player's media (photo).
     */
    public function media()
    {
        return $this->belongsTo(Media::class);
    }
    
    /**
     * Get the player's full name.
     */
    public function getFullNameAttribute()
    {
        return "{$this->first_name} {$this->last_name}";
    }
    
    /**
     * Calculate the player's age based on birthdate.
     */
    public function getAgeAttribute()
    {
        return $this->birthdate ? Carbon::parse($this->birthdate)->age : null;
    }
    
    /**
     * Scope a query to only include injured players.
     */
    public function scopeInjured($query)
    {
        return $query->where('is_injured', true);
    }
    
    /**
     * Scope a query to only include players by position.
     */
    public function scopeByPosition($query, $position)
    {
        return $query->where('position', $position);
    }
    
    /**
     * Get the player's position with full name.
     */
    public function getPositionNameAttribute()
    {
        return [
            'GK' => 'Goalkeeper',
            'SW' => 'Sweeper',
            'CB' => 'Center Back',
            'LB' => 'Left Back',
            'RB' => 'Right Back',
            'LWB' => 'Left Wing Back',
            'RWB' => 'Right Wing Back',
            'CDM' => 'Defensive Midfielder',
            'CM' => 'Center Midfielder',
            'CAM' => 'Attacking Midfielder',
            'LM' => 'Left Midfielder',
            'RM' => 'Right Midfielder',
            'LW' => 'Left Winger',
            'RW' => 'Right Winger',
            'CF' => 'Center Forward',
            'ST' => 'Striker'
        ][$this->position] ?? $this->position;
    }
    
    /**
     * Get the player's preferred foot in full text.
     */
    public function getPreferredFootNameAttribute()
    {
        return [
            'left' => 'Left',
            'right' => 'Right',
            'both' => 'Both'
        ][$this->preferred_foot] ?? $this->preferred_foot;
    }
    
    /**
     * Get the player's gender in full text.
     */
    public function getGenderNameAttribute()
    {
        return [
            'male' => 'Male',
            'female' => 'Female',
            'other' => 'Other'
        ][$this->gender] ?? $this->gender;
    }
}
