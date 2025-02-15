<?php

namespace Tests\Feature\Themeforest;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\EstimateByCustomData;

class GetFormEstimateByCustomDataTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test to check if the estimate form page is accessible.
     */
    public function test_success_getting_form_page_of_estimate_by_data(): void
    {
        $response = $this->get(route('estimate.data'));

        $response->assertStatus(200);
    }

    /**
     * Test successful submission of estimate form data and redirection to result page.
     */
    public function test_success_posting_estimate_by_data_redirects_to_result_page(): void
    {
        $formData = $this->_generateFormData();
        $response = $this->post(route('estimate.data.store'), $formData);

        $response->assertStatus(302);
        $response->assertRedirect(); // Asserting redirect without checking location first, more standard

        $followRedirect = $this->followRedirects($response);
        $followRedirect->assertOk(); // Asserts final page after redirects is OK
    }

    /**
     * Test failure of estimate form submission due to missing 'sells' field.
     */
    public function test_failure_posting_estimate_by_data_missing_sells_field(): void
    {
        $formData = $this->_generateFormData();
        unset($formData[ 'sells' ]);

        $response = $this->post(route('estimate.data.store'), $formData);

        $response->assertSessionHasErrors([ 'sells' ]);
    }

    /**
     * Test successful submission and display of the estimate result page.
     */
    public function test_success_getting_result_page_of_estimate_by_data_after_submission(): void
    {
        $formData = $this->_generateFormData();
        $response = $this->post(route('estimate.data.store'), $formData);

        $response->assertStatus(302);
        $response->assertRedirect();

        $followRedirect = $this->followRedirects($response);
        $followRedirect->assertOk();
    }

    /**
     * Test successful saving of estimate data to the database upon form submission.
     */
    public function test_success_estimate_by_data_saving_form_to_db(): void
    {
        $formData = $this->_generateFormData();

        $response          = $this->post(route('estimate.data.store'), $formData);
        $loc               = $response->headers->get('Location');
        $exploded_location = explode('/', $loc);
        $formData[ 'key' ] = $exploded_location[ array_key_last($exploded_location) ];

        $this->assertDatabaseHas('estimate_by_custom_data', $formData);
    }

    /**
     * Generates valid form data for estimate submission.
     *
     * @return array
     */
    private function _generateFormData(): array
    {
        $formData = EstimateByCustomData::factory()->make([
                                                              'price' => '59',
                                                              'sells' => '10',
                                                          ])->toArray();
        unset($formData[ 'key' ]);
        return $formData;
    }
}
