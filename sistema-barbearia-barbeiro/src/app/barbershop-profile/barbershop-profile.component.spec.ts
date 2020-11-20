import { ComponentFixture, TestBed } from '@angular/core/testing';

import { BarbershopProfileComponent } from './barbershop-profile.component';

describe('BarbershopProfileComponent', () => {
  let component: BarbershopProfileComponent;
  let fixture: ComponentFixture<BarbershopProfileComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ BarbershopProfileComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(BarbershopProfileComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
