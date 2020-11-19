import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GeneralBarberDataComponent } from './general-barber-data.component';

describe('GeneralBarberDataComponent', () => {
  let component: GeneralBarberDataComponent;
  let fixture: ComponentFixture<GeneralBarberDataComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GeneralBarberDataComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GeneralBarberDataComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
